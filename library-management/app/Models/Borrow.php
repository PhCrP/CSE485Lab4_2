<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu bảng không phải là tên theo quy ước (plural form của model)
    protected $table = 'borrows';

    // Các thuộc tính có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'reader_id', 'book_id', 'borrow_date', 'return_date', 'status',
    ];

    // Định dạng lại kiểu dữ liệu nếu cần
    protected $casts = [
        'borrow_date' => 'date',
        'return_date' => 'date',
        'status' => 'boolean', // Đảm bảo status là kiểu boolean
    ];

    // Mối quan hệ với Reader: Mỗi phiếu mượn có một người đọc
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    // Mối quan hệ với Book: Mỗi phiếu mượn có một cuốn sách
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
