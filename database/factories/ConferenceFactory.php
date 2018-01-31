<?php

use Faker\Generator as Faker;

$factory->define(App\Conference::class, function (Faker $faker) {
    return [

    	'abstract' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'pages' => $faker->numberBetween($min = 0, $max = 500).'-'.$faker->numberBetween($min = 0, $max = 500),
    	'days' => $faker->date($format = 'Y-m-d', $max = 'now').'/'.$faker->date($format = 'Y-m-d', $max = 'now'),
    	'year' => $faker->year($max = 'now'),

        'key' => $faker->slug,
        'doi' => $faker->slug,
        'ee' => $faker->slug,
        'url' => $faker->url
    ];
});
