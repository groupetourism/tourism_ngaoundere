<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'VINA', 'surface_area' => 18487],
            ['name' => 'MAYO BANYO', 'surface_area' => 8520],
            ['name' => 'DJEREM', 'surface_area' => 13283],
            ['name' => 'MBERE', 'surface_area' => 17000],
            ['name' => 'FARO ET DEO', 'surface_area' => 11200],
        ]);
    }
}
