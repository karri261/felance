<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Đặt tên bảng (nếu không theo quy ước mặc định 'reports' thì sẽ phải khai báo tên bảng thủ công)
    protected $table = 'reports';

    // Các trường có thể mass assignable (chỉ cho phép gán giá trị cho các trường này)
    protected $fillable = [
        'reporter_id', 
        'reported_user_id', 
        'reason', 
        'status', 
        'admin_decision',
    ];

    // Các trường không thể mass assignable
    protected $guarded = ['id'];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }
}
