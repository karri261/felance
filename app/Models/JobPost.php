<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts'; // Chỉ định tên bảng

    protected $fillable = [
        'job_id',
        'company_name',
        'company_logo',
        'location',
        'salary_min',
        'salary_max', 
        'openings_position',
        'experience_required',
        'job_title'
    ];
}