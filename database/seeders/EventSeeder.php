<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            ['site_id' => 1, 'name' => 'Waterfall Festival', 'description' => 'An annual festival celebrating the beauty of the waterfall.', 'ticket_price' => 1000, 'start_date' => '2024-01-15 10:00:00', 'end_date' => '2024-01-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['site_id' => 1, 'name' => 'Ngondo Festival', 'description' => 'An annual festival celebrating the beauty of the waterfall.', 'ticket_price' => 1000, 'start_date' => '2024-01-15 10:00:00', 'end_date' => '2024-01-15 18:00:00', 'image' => 'https://fakeimg.pl/300/'],
            ['site_id' => 1, 'name' => 'Waterfall Festival', 'description' => 'An annual festival celebrating the beauty of the waterfall.', 'ticket_price' => 1000, 'start_date' => '2024-02-15 10:00:00', 'end_date' => '2024-02-15 18:00:00', 'image' => 'https://fakeimg.pl/300/']
        ]);
    }
}
