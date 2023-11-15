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
                'context' => '11-15',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-16 10:00:00',
                'end' => '2023-11-16 12:00:00',
                'place' => 'Home',
                'context' => '11-16',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-12-16 10:00:00',
                'end' => '2023-12-16 12:00:00',
                'place' => 'Home',
                'context' => '12-16',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-26 10:00:00',
                'end' => '2023-12-26 12:00:00',
                'place' => 'Home',
                'context' => '11-26',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-22 10:00:00',
                'end' => '2023-11-22 12:00:00',
                'place' => 'Home',
                'context' => '11-22 10:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-22 22:00:00',
                'end' => '2023-11-22 23:00:00',
                'place' => 'Home',
                'context' => '11-22 22:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
