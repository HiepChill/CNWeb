<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SaleTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => rand(1, 6), // Lấy id thuốc ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
