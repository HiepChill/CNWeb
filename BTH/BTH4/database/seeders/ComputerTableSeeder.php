<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->numberBetween(1, 100),
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5',
                'memory' => $faker->randomElement([4, 8, 16]),
                'available' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
