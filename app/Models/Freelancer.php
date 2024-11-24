<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'languages',
        'cv_path',
        'address',
        'phone_number',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'image_paths',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'user_id', 'user_id');
    }
}
