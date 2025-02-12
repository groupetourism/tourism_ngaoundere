<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartmentSeeder::class,
            HeadquarterSeeder::class,
            UserSeeder::class,
            SiteSeeder::class,
            ReservationSeeder::class,
            VehicleSeeder::class,
            AccommodationSeeder::class,
            RoomSeeder::class,
            EventSeeder::class,
            TourSeeder::class,
        ]);
    }
}
