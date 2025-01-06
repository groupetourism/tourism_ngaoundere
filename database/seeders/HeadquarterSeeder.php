<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeadquarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('headquarters')->insert([
            ['department_id' => 1, 'name' => 'Ngaoundéré 1er'],
            ['department_id' => 1, 'name' => 'Ngaoundéré 2e'],
            ['department_id' => 1, 'name' => 'Ngaoundéré 3e'],
            ['department_id' => 1, 'name' => 'Belel'],
            ['department_id' => 1, 'name' => 'Mbé'],
            ['department_id' => 1, 'name' => 'Martap'],
            ['department_id' => 1, 'name' => 'Nyambaka'],
            ['department_id' => 1, 'name' => 'Ngan’ha'],
            ['department_id' => 2, 'name' => 'Banyo'],
            ['department_id' => 2, 'name' => 'Bankim'],
            ['department_id' => 2, 'name' => 'Mayo Darlé'],
            ['department_id' => 3, 'name' => 'Tibati'],
            ['department_id' => 3, 'name' => 'Ngaoundal'],
            ['department_id' => 4, 'name' => 'Meiganga'],
            ['department_id' => 4, 'name' => 'Dir'],
            ['department_id' => 4, 'name' => 'Djohong'],
            ['department_id' => 4, 'name' => 'Ngaoui'],
            ['department_id' => 5, 'name' => 'Tignère'],
            ['department_id' => 5, 'name' => 'Mayo Baléo'],
            ['department_id' => 5, 'name' => 'Galim Tignère'],
            ['department_id' => 5, 'name' => 'Kontcha'],
        ]);
    }
}
