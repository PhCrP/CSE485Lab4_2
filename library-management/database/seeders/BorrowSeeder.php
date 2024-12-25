<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reader;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Borrow::create([
                'reader_id' => Reader::inRandomOrder()->first()->id,
                'book_id' => Book::inRandomOrder()->first()->id,
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date(),
                'status' => $faker->boolean(),
            ]);
        }
    }
}
