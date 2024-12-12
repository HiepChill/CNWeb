<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseTablesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        //Insert 
        DB::table('classes')->insert([
            [
                'grade_level' => 'Pre-K',
                'room_number' => 'RG01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_level' => 'Kindergarten',
                'room_number' => 'RG02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade_level' => 'Pre-K',
                'room_number' => 'RG03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => $faker->phoneNumber,
                'class_id' => rand(1, 2), // Lấy id lớp ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert data into 'computers'
        for ($i = 0; $i < 10; $i++) {
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

        // Insert data into 'issues'
        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id' => rand(1, 5), // Lấy id máy tính ngẫu nhiên
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert data into 'medicines'
        for ($i = 0; $i < 10; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->word,
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(
                    2,
                    1,
                    100
                ),
                'stock' => $faker->numberBetween(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert data into 'sales'
        for ($i = 0; $i < 10; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => rand(1, 5), // Lấy id thuốc ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
