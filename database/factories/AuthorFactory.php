<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [

        'first_name' => $faker->firstName($gender = 'male'|'female'),
        'last_name' => $faker->lastName,
        //'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50)

    ];
});
