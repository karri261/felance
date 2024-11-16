<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'conversation_id',
        'sender_id',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'sender_id', 'user_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
