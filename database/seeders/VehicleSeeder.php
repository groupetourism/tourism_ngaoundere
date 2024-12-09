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
        DB::table('hotels')->insert([
            ['type' => 'Bus', 'provider_name' => 'Ngaoundere Bus Services', 'price' => 1500, 'contact_info' => 'info@ngaounderebus.com', 'website' => 'http://ngaounderebus.com',]
        ]);
    }
}
