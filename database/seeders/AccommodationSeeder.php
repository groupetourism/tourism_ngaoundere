<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accommodations')->insert([
            ['type' => 1, 'name' => 'Hotel A',  'description' => 'A comfortable hotel in the city center.', 'latitude' => 7.3215634, 'longitude' => 13.5793109, 'price_per_day' => null, 'number_of_stars' => 5, 'number_of_parlors' => null, 'number_of_rooms' => null, 'number_of_kitchens' => null, 'number_of_bathroom' =>null,  'number_of_shower' => null, 'parking' => 1, 'balcony' => null, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'hotel@example.com', 'website' => 'https://hotelngaoundere.com'],
            ['type' => 2, 'name' => 'Residence A',  'description' => 'A comfortable residence in the city center.', 'latitude' => 7.3215613, 'longitude' => 13.5793109, 'price_per_day' => 4000, 'number_of_stars' => 3, 'number_of_parlors' => 1, 'number_of_rooms' => 3, 'number_of_kitchens' => 1, 'number_of_bathroom' => 1,  'number_of_shower' => 1, 'parking' => 1, 'balcony' => 1, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'residence@example.com', 'website' => 'https://residencengaoundere.com'],
            ['type' => 3, 'name' => 'Hospital A',  'description' => 'A comfortable hospital in the city center.', 'latitude' => 7.3215634, 'longitude' => 13.5793303, 'price_per_day' => null, 'number_of_stars' => null, 'number_of_parlors' => null, 'number_of_rooms' => null, 'number_of_kitchens' => null, 'number_of_bathroom' =>null,  'number_of_shower' => null, 'parking' => null, 'balcony' => null, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'hospital@example.com', 'website' => 'https://hospitalngaoundere.com'],
        ]);
    }
}
