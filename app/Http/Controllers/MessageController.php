<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employer;
use App\Models\Freelancer;
use App\Models\Messages;
use App\Models\Conversation;

class MessageController extends Controller
{
    public function getConversations()
    {
        $conversations = Conversation::where('user1_id', Auth::id())
            ->orWhere('user2_id', Auth::id())
            ->with(['messages' => function ($query) {
                $query->latest();
            }])
            ->with('applicant.job') 
            ->get()
            ->map(function ($conversation) {
                $currentUserId = Auth::id();

                $isFreelancer = Freelancer::where('user_id', $currentUserId)->exists();
                $isEmployer = Employer::where('user_id', $currentUserId)->exists();

                $otherUserId = $conversation->user1_id == $currentUserId ? $conversation->user2_id : $conversation->user1_id;

                if ($isFreelancer && $otherUserId) {
                    $otherUser = Employer::with('user')->where('user_id', $otherUserId)->first();
                } elseif ($isEmployer && $otherUserId) {
                    $otherUser = Freelancer::with('user')->where('user_id', $otherUserId)->first();
                }

                $jobTitle = null;
                if ($conversation->applicant && $conversation->applicant->job) {
                    $jobTitle = $conversation->applicant->job->job_title;
                }

                return [
                    'id' => $conversation->id,
                    'user' => $otherUser,
                    'last_message' => $conversation->messages->first(),
                    'job_title' => $jobTitle
                ];
            });
        return response()->json($conversations);
    }

    public function getMessages($conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);

        $messages = $conversation->messages()
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request, $conversationId)
    {
        $message = new Messages();
        $message->conversation_id = $conversationId;
        $message->sender_id = Auth::id();
        $message->content = $request->message;
        $message->save();

        $message->load('user');

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

}
