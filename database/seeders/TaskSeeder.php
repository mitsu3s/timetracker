<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'begin' => '2023-11-15 08:00:00',
                'end' => '2023-11-15 10:00:00',
                'place' => 'Home',
                'context' => '11/15 08:00-10:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-16 10:00:00',
                'end' => '2023-11-16 12:00:00',
                'place' => 'Home',
                'context' => '11/16 10:00-12:00',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-13 13:00:00',
                'end' => '2023-11-13 15:00:00',
                'place' => 'Home',
                'context' => '11/13 13:00-15:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-22 15:00:00',
                'end' => '2023-11-22 17:00:00',
                'place' => 'Home',
                'context' => '11/22 15:00-17:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-23 17:00:00',
                'end' => '2023-11-23 19:00:00',
                'place' => 'Home',
                'context' => '11/23 17:00-19:00',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-24 19:00:00',
                'end' => '2023-11-24 21:00:00',
                'place' => 'Home',
                'context' => '11/24 19:00-21:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
