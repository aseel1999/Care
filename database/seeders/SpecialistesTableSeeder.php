<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ORM: Eloquent Model
        Specialiste::create([
            'name'=>'Pulnumology',

        ]);
        return;
        for($i =1;$i<=10;$i++){
        DB::table('specialistes')->insert([
          'name'=>'Cardiology'.$i,
        ]);
        }
       // DB::connection('mysql')->table('specialistes')->insert([
        //    'name'=>'Pulnumology',
         // ]);
        // SQL commands
        // INSERT INTO specialistes (name)
        //VALUES ('cardialog')
       // DB::statment("INSERT INTO specialistes (name)
        //VALUES ('Bin')");
    }
}
