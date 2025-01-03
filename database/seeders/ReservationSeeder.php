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
        DB::table('reservations')->insert([
            ['user_id' => 1,  'start_date' => '2024-01-15 19:00:00', 'end_date' => '2024-01-16 07:00:00', 'total_price' => 3000, 'status' => 0, 'reservable_id' => 1, 'reservable_type' => 'app/Accommodation'],
            ['user_id' => 2,  'start_date' => '2024-01-15 09:00:00', 'end_date' => '2024-01-15 19:00:00', 'total_price' => 2000, 'status' => 0, 'reservable_id' => 1, 'reservable_type' => 'app/Vehicle'],
        ]);
    }
}
