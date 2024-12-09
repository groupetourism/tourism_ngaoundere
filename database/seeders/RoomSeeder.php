<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            ['hotel_id' => 1,  'price_per_night' => 10000, 'is_available' => true],
            ['hotel_id' => 2,  'price_per_night' => 10000, 'is_available' => false],
        ]);
    }
}
