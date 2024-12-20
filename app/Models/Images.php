<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    // Khai báo bảng tương ứng nếu tên bảng không ở dạng số nhiều
    protected $table = 'images';

    // Khai báo các cột có thể điền (fillable)
    protected $fillable = [
        'name',         // Tên ảnh
        'image_path',   // Đường dẫn ảnh
    ];
}