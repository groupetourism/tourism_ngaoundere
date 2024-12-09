<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['lastname'=>'Fangueng Tella', 'firstname'=>'Ruth Cabel', 'email'=>'ruthfangueng@gmail.com', 'phone'=>100000000, 'password'=> bcrypt("user1"), 'is_admin'=>true],
        ]);
    }
}
