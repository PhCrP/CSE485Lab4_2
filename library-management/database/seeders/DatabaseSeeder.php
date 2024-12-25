<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call([
        //     BookSeeder::class,
        // ]);
        // $this->call([
        //     ReaderSeeder::class,
        // ]);
        $this->call([
            BorrowSeeder::class,
        ]);
    }
}
