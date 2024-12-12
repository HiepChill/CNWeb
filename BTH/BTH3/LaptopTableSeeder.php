<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word,
                'specifications' => 'i5, 8GB RAM, 256GB SSD',
                'rental_status' => $faker->boolean, // true/false ngẫu nhiên
                'renter_id' => rand(1, 5), // Lấy id người thuê ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
