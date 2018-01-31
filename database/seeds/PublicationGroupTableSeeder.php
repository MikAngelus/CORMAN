<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PublicationGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user_list = App\User::all();

        foreach ($user_list as $use) {
            //$save=0;
            $a =array_fill(0, $save=$faker->randomDigitNotNull($min=1, $max=10), 0);

            for($i=0; $i<$save; $i++){
                $a[$i]=$faker->randomDigitNotNull($min=1, $max=50);
            }
            $use->publications()->attach($a, ['created_at'=>$faker->date($format = 'Y-m-d', $max = 'now'),'updated_at'=>$faker->date($format = 'Y-m-d', $max = 'now')]);
        }

    }
}
