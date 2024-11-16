<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'languages',
        'address',
        'phone_number',
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
