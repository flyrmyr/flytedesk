<?php

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
	// Randomize school type
	$type = ['College', 'University'][rand(0,1)];

	// Randomize school region
	switch(rand(1,3)) {
		case 1: $region = $faker->city; break;
		case 2: $region = $faker->state; break;
		case 3: $region = $faker->streetName; break;
	}

	// Generate school name
	switch(rand(1,2)) {
		case 1: $name = $type . ' of ' . $region; break;
		case 2: $name = $region . ' ' . $type; break;
	}

	// Create school with created name
    return [
        'name' => $name,

		'postal_code' => $faker->postcode,

        'circulation' => rand(2000, 60000)
    ];
});