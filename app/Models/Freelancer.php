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
    ];
}
