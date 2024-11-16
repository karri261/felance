<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_id';

    protected $fillable = [
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
        'job_type'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'job_id', 'job_id');
        // Tham số thứ 2: foreign key trong bảng favorites
        // Tham số thứ 3: local key trong bảng job_posts
    }

    public function isFavoritedBy($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
}
