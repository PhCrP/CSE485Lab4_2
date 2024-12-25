<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Book::create([
                'name' => $faker->name(),
                'author' => $faker->name(),
                'category' => $faker->sentence(),
                'year' => $faker->year(),
                'quantity' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
