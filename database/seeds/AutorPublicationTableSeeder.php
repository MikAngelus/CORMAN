<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AutorPublicationTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $autor_list = App\Autor::all();

        foreach ($autor_list as $autor) {
            //$save=0;
            $a = array_fill(0, $save = $faker->randomDigitNotNull($min = 1, $max = 10), 0);
            for ($i = 0; $i < $save; $i++) {
                $a[$i] = $faker->randomDigitNotNull($min = 1, $max = 50);
            }
            $autor->publications()->attach($a);
        }
    }
}
