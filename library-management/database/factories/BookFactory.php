<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'author' => fake()->name(),
            'category' => fake()->sentence(),
            'year' => fake()->year(),
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}