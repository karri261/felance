<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'applied_at'
    ];

    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_id', 'job_id');
    }
}
