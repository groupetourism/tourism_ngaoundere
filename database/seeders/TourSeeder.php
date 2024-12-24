<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tours')->insert([
            ['user_id' => 1, 'site_id' => 1, 'accommodation_id' => 1, 'vehicle_id' => 1, 'start_date' => '2024-01-10 00:00:00', 'end_date' => '2024-01-15 23:59:59'],
            ['user_id' => 2, 'site_id' => 1, 'accommodation_id' => 1, 'vehicle_id' => 1, 'start_date' => '2024-01-10 00:00:00', 'end_date' => '2024-01-15 23:59:59'],
        ]);
    }
}
