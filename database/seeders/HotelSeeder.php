<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            ['name' => 'Hotel Ngaoundere',  'description' => 'A comfortable hotel in the city center.',  'contact_info' => 'hotel@example.com', 'website' => 'http://hotelngaoundere.com'],
            ['name' => 'Hotel Ngaoundere',  'description' => 'A comfortable hotel in the city center.',  'contact_info' => 'hotel@example.com', 'website' => 'http://hotelngaoundere.com'],
        ]);
    }
}
