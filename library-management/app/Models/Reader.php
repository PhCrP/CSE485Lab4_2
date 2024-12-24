<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu bảng không phải là tên theo quy ước (plural form của model)
    protected $table = 'readers';

    // Các thuộc tính có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'name', 'birthday', 'address', 'phone'
    ];

    // Nếu bạn muốn sử dụng kiểu dữ liệu ngày tháng cho 'birthday', có thể thêm cast
    protected $casts = [
        'birthday' => 'date',
    ];

    // Bạn có thể thêm các mối quan hệ nếu Reader có mối quan hệ với các bảng khác
    // Ví dụ: nếu mỗi người đọc có nhiều phiếu mượn sách (mối quan hệ One to Many)
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
