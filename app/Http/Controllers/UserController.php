<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function toggleStatus($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        $user->status = $user->status === 'active' ? 'banned' : 'active';
        $user->save();

        return response()->json([$id, 'success' => true, 'new_status' => $user->status]);
    }
    
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        try {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete user.']);
        }
    }


}