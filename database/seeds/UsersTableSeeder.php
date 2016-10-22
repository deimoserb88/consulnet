<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();
    	foreach(range(1,10) as $i){

	        DB::table('users')->insert([
	            'name' => $faker->firstName,
	            'nom' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	            'priv' => $faker->numberBetween(0,5),
	        ]);
	    }
    }
}
