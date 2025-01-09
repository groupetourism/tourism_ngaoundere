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
            ['department_id' => 1, 'type' => 1, 'license_plate' => 'AUF42-23HFZ', 'provider_name' => 'Touristique', 'description' => 'taxi à cinq places', 'number_of_seats' => 5, 'price_per_hour' => 200, 'is_available' => 0, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'info@ngaounderebus.com', 'website' => 'https://ngaounderebus.com'],
            ['department_id' => 1, 'type' => 2, 'license_plate' => 'BUE42-23HFZ', 'provider_name' => 'Touristique', 'description' => 'voiture de location à 6 places', 'number_of_seats' => 6, 'price_per_hour' => 300, 'is_available' => 0, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'info@ngaounderebus.com', 'website' => 'https://ngaounderebus.com'],
            ['department_id' => 1, 'type' => 3, 'license_plate' => 'LEJ42-23HFZ', 'provider_name' => 'Touristique', 'description' => 'bus à 25 places', 'number_of_seats' => 25, 'price_per_hour' => 500, 'is_available' => 1, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'info@ngaounderebus.com', 'website' => 'https://ngaounderebus.com'],
        ]);
    }
}
