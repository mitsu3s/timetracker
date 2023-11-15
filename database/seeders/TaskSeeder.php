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
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 10:00:00',
                'end' => '2023-11-15 12:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 12:00:00',
                'end' => '2023-11-15 14:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 14:00:00',
                'end' => '2023-11-15 16:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 16:00:00',
                'end' => '2023-11-15 18:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 18:00:00',
                'end' => '2023-11-15 20:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'begin' => '2023-11-15 20:00:00',
                'end' => '2023-11-15 22:00:00',
                'place' => 'Home',
                'context' => 'housework',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
