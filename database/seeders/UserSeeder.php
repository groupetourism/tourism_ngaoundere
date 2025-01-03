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
            ['lastname'=>'Fangueng Tella', 'firstname'=>'Ruth Cabel', 'email'=>'ruthfangueng@gmail.com', 'phone'=>999999999, 'password'=> bcrypt("adminadmin"), 'is_admin'=>true],
            ['lastname'=>'Lastname1', 'firstname'=>'Firstname1', 'email'=>'lastname1@gmail.com', 'phone'=>100000000, 'password'=> bcrypt("user1user1"), 'is_admin'=>false],
        ]);
    }
}
