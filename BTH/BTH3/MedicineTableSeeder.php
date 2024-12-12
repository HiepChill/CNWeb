<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicineTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->word,
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(2, 1, 100),
                'stock' => $faker->numberBetween(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
