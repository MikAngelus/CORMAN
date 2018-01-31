<?php

use Illuminate\Database\Seeder;

class EditorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    factory(App\Editorship::class, 10)->create();
    }
}
