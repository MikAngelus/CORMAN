<?php

use Illuminate\Database\Seeder;

class ConferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\Conference::class, 10)->create();
    }
}
