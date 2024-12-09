<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            ['user_id' => 1,  'date' => '2024-07-20',  'time' => '14:00:00', 'reservable_id' => 1, 'reservable_type' => 'hotels'],
            ['user_id' => 1,  'date' => '2024-07-20',  'time' => '14:00:00', 'reservable_id' => 1, 'reservable_type' => 'hotels'],
        ]);
    }
}
