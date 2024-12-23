<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Messages;

class Conversation extends Model
{
    protected $fillable = [
        'user1_id',
        'user2_id',
        'applicant_id'
    ];

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'conversation_user');
    }

    public function applicant()  
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
