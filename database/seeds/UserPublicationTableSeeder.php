<?php

use Illuminate\Database\Seeder;

class UserPublicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pubList = App\Publication::all();

        foreach($pubList as $pub){

            $pub->users()->attach([1,2]);
        }
    }
}
