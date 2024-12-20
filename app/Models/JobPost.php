<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';
    protected $primaryKey = 'job_id';

    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'company_logo',
        'location',
        'salary_min',
        'salary_max',
        'openings_position',
        'experience_required',
        'job_description',
        'responsibilities',
        'background',
        'gender',
        'categories',
        'qualification',
        'career_level',
        'end_date',
        'short_describe',
        'status'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'job_id', 'job_id');
    }

    public function isFavoritedBy($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'job_id', 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
