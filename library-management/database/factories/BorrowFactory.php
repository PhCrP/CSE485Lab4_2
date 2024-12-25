<?php

namespace Database\Factories;

use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition(): array
    {
        return [
            'reader_id' => Reader::factory(),
            'book_id' => Book::factory(),
            'borrow_date' => fake()->date(),
            'return_date' => fake()->date(),
            'status' => fake()->boolean(),
        ];
    }
}
