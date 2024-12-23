<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            ['type' => 1, 'license_plate' => 'AUF42-23HFZ', 'provider_name' => 'Touristique', 'description' => 'blabla', 'number_of_places' => 5, 'price_per_hour' => 200, 'is_available' => 0, 'image_url' => 'https://fakeimg.pl/300/', 'contact_info' => 'info@ngaounderebus.com', 'website' => 'https://ngaounderebus.com',]
        ]);
    }
}
