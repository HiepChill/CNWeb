<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber,
                'class_id' => rand(1, 3), // Lấy id lớp ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
