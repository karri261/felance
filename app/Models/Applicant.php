<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'user_id', 'user_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'applicant_id', 'id');
    }
}
