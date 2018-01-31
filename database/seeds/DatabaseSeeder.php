<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AffiliationTableSeeder::class,
            RoleTableSeeder::class,
            UsersTableSeeder::class,
            PublicationsTableSeeder::class,
            TopicsTableSeeder::class,
            GroupsTableSeeder::class,
            UserGroupTableSeeder::class,
            UserTopicTableSeeder::class,
            TopicGroupTableSeeder::class,
            TopicPublicationTableSeeder::class,
            UserPublicationTableSeeder::class
        ]);


/*
        //TODO Seeder to implement
        //$this->call(JournalsTableSeeder::class);
        //$this->call(ConferencesTableSeeder::class);
        //$this->call(EditorshipsTableSeeder::class);
        //$this->call(PublicationGroupTableSeeder::class);
*/
    }
}
