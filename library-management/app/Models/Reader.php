<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    // Các thuộc tính có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'name', 'birthday', 'address', 'phone',
    ];

    // Nếu bạn muốn sử dụng kiểu dữ liệu ngày tháng cho 'birthday', có thể thêm cast
    protected $casts = [
        'birthday' => 'date',
    ];
    
}
