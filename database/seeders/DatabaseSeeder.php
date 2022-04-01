<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    // Specialiste::factory(10)->crate();
        // \App\Models\User::factory(10)->create();
       
        $this->call([
            AdminSeeder::class,
            //SpecialistesTableSeeder::class,
           // UsersTableSeeder::class,
        ]);
    }
}
