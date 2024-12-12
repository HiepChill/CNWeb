<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->word,
                'library_id' => rand(1, 5), // Lấy id thư viện ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
