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
        $openingHours0 = json_encode([
            "Monday" => ["open" => "08:00", "close" => "18:00"],
            "Tuesday" => ["open" => "08:00", "close" => "18:00"],
            "Wednesday" => ["open" => "08:00", "close" => "18:00"],
            "Thursday" => ["open" => "08:00", "close" => "18:00"],
            "Friday" => ["open" => "08:00", "close" => "18:00"],
            "Saturday" => ["open" => "10:00", "close" => "16:00"],
            "Sunday" => ["open" => "10:00", "close" => "16:00"],
        ]);
        $openingHours1 = json_encode([
            "Monday" => ["open" => "00:00", "close" => "23:59"],
            "Tuesday" => ["open" => "00:00", "close" => "23:59"],
            "Wednesday" => ["open" => "08:00", "close" => "18:00"],
            "Thursday" => ["open" => "08:00", "close" => "20:00"],
            "Friday" => ["open" => "08:00", "close" => "20:00"],
            "Saturday" => ["open" => "10:00", "close" => "16:00"],
            "Sunday" => null,
        ]);
        DB::table('sites')->insert([
            ['name' => 'Waterfall Of Ngaoundere', 'description' => 'A beautiful waterfall located in the heart of Ngaoundere.', 'latitude' => 7.3215634, 'longitude' => 13.5793109, 'opening_hours' => $openingHours0, 'ticket_price' => 500, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'hotel@example.com', 'website' => 'https://shutngaoundere.com'],
            ['name' => 'Mount Ngaoundere', 'description' => 'A popular hiking destination with stunning views.', 'latitude' => 7.3215634, 'longitude' => 13.5793109, 'opening_hours' => $openingHours1, 'ticket_price' => 500, 'image' => 'https://fakeimg.pl/300/', 'contact_info' => 'hotel@example.com', 'website' => 'https://mountngaoundere.com'],
        ]);
    }
}
