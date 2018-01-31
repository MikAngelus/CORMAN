<?php

use Faker\Generator as Faker;

$factory->define(App\Editorship::class, function (Faker $faker) {
    return [

    	'abstract' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'volume' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    	'publisher' =>$faker->name,
    	'year' => $faker->year($max = 'now'),

        'key' => $faker->slug,
        'doi' => $faker->slug,
        'ee' => $faker->slug,
        'url' => $faker->url
        
    ];
});
