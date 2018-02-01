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
        $pg_list = array();

        for($i=0; $i<count($group_list); $i++){

            $pg = new App\PublicationGroup();
            $pg_list[$i]->add($pg);
        }

        foreach ($group_list as $g) {
            

        }
        /*
         *
            $pg = new App\PublicationGroup();
            $pg->publication_id=3;
            $pg->group_id=3;
            $pg->user_id=3;
            $pg->save();

        *
        */

        foreach ($group_list as $g) {
            $pg = new App\PublicationGroup();

            $use = $faker->randomDigitNotNull($min = 1, $max = 3);

            do {
                $pub = $faker->randomDigitNotNull($min = 1, $max = 3);

            } while (array_unique([$g->id,$pub]));


            $pg->publication_id = $pub;
            $pg->group_id = $g->id;
            $pg->user_id = $use;
            $pg->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $pg->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $pg->save();


            //App\PublicationGroup::create(['publication_id' => $pub, 'group_id' => $g->id, 'user_id' => $use, 'created_at' => $faker->dateTime($max = 'now', $timezone = null), 'updated_at' => $faker->dateTime($max = 'now', $timezone = null)]);


        }

    }

}
