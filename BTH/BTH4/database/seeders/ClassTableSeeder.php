<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

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
    }
}
