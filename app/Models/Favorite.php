<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'job_id'
    ];

    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_id', 'job_id');
    }
}
