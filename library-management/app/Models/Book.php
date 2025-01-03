<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    protected $fillable = [
        'name', 'author', 'category', 'year', 'quantity',
    ];
    
}
