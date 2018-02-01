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

        $group_list = App\Group::all();
        $pg_list[] = App\PublicationGroup()::all();
        $pg = new App\PublicationGroup();


        foreach ($group_list as $g) {
                $save=$faker->randomDigitNotNull($min=1, $max=10);
                $pub =array_fill(0, $save, 0);
                $use =array_fill(0, $save, 0);

                for($i=0; $i<$save; $i++){
                    do {

                        $pub[$i]=$faker->randomDigitNotNull($min=1, $max=5);

                    }while(($g->id)==$pub[$i]);

                    $use[$i]=$faker->randomDigitNotNull($min=1, $max=5);

                    $caramel=array(['publication_id' => $pub[$i], 'group_id' => $g->id, 'user_id' => $use[$i], 'created_at' => $faker->dateTime($max = 'now', $timezone = null),'updated_at' => $faker->dateTime($max = 'now', $timezone = null)]);

                    $g->shares()->save($caramel);
                }

            }

    }
}
