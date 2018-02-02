<?php

use Illuminate\Database\Seeder;

class AutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Autor::class, 50)->create();
    }
}
