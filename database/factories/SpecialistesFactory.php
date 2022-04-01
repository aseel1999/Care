<?php

namespace Database\Factories;
use App\Models\Specialiste;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialiste>
 */
class SpecialistesFactory extends Factory
{
    protected $model=Specialiste::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //Faker
        //select id FROM specialistes ORDER BY RAND() LIMIT 1
        //get by default take get(['*'])
        // get return collection
        // first return one object
        // without true return as array
        //get return as array
        //first return first result
        //$status=['active','draft'];
        //'status'=>$status[rand(0,1)],

       $specialistes= DB::table('specialistes')->inRandomOrder()->limit(1)->first(['id']);
        $name=$this->faker->words(2,true);
        return [
           'name'=>$name,
        ];
    }
}
