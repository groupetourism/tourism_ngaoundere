<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            ['name' => 'Waterfall of Ngaoundere', 'description' => 'A beautiful waterfall located in the heart of Ngaoundere.', 'latitude' => 7.3215634, 'longitude' => 13.5793109, 'opening_hours' => '08:00 - 18:00', 'ticket_price' => 500, 'image_url' => 'http://example.com/waterfall.jpg'],
            ['name' => 'Mount Ngaoundere', 'description' => 'A popular hiking destination with stunning views.', 'latitude' => 7.3215634, 'longitude' => 13.5793109, 'opening_hours' => '08:00 - 18:00', 'ticket_price' => 500, 'image_url' => 'http://example.com/waterfall.jpg'],
        ]);
    }
}
