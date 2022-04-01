<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
'name'=>'aseel',
'email'=>'aseelmaysoum@gmail.com',
'password'=>Hash::make('password'),
'age'=>22,
'phone'=>'0598689938',
'address'=>'Nusierat',
'date_of_birth'=>26/10/1999,
'social_status'=>'single',
'blood_type'=>'O-',


        ]);
    }
}
