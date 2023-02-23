<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//import library
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i=0; $i<5; $i++) {
            DB::table('todos')->insert([
                'date' => $faker->datetime,
                'todo' => $faker->text,
                'status' => $faker->randomElement(['Y','N']),
            ]);
        }
    }
}
