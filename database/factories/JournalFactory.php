<?php

use Faker\Generator as Faker;

$factory->define(App\Journal::class, function (Faker $faker) {
    return [

    	'abstract' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'volume' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    	'number' => $faker->randomDigitNotNull,
    	'pages' => $faker->numberBetween($min = 0, $max = 500).'-'.$faker->numberBetween($min = 0, $max = 500),
    	'year' => $faker->year($max = 'now'),

        'key' => $faker->slug,
        'doi' => $faker->slug,
        'ee' => $faker->slug,
        'url' => $faker->url

    ];
});

