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
        DB::table('rooms')->insert([
            ['accommodation_id' => 1, 'room_number' => 001,  'capacity' => 4, 'price_per_night' => 30000, 'is_available' => true, 'image' => 'https://fakeimg.pl/300/'],
            ['accommodation_id' => 1, 'room_number' => 002,  'capacity' => 2, 'price_per_night' => 20000, 'is_available' => false, 'image' => 'https://fakeimg.pl/300/'],
        ]);
    }
}
