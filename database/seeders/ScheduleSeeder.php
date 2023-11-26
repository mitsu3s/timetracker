<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'context' => 'Meeting',
                'place' => 'Lab',
                'begin' => '2023-11-25 18:00:00',
                'end' => '2023-11-25 21:30:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'context' => 'テスト',
                'place' => '1号館',
                'begin' => '2023-11-15 10:40:00',
                'end' => '2023-11-15 12:10:00',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'context' => 'Study Golang',
                'place' => 'どこでも',
                'begin' => '2023-11-20 00:00:00',
                'end' => '2023-12-10 00:00:00',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'context' => 'アルバイト',
                'place' => '塾',
                'begin' => '2023-11-30 17:00:00',
                'end' => '2023-12-31 01:00:00',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
