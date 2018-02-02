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
            AutorTableSeeder::class,
            AutorPublicationTableSeeder::class,
            TopicsTableSeeder::class,
            GroupsTableSeeder::class,
            UserGroupTableSeeder::class,
            UserTopicTableSeeder::class,
            TopicGroupTableSeeder::class,
            TopicPublicationTableSeeder::class,
            UserPublicationTableSeeder::class,

            JournalsTableSeeder::class,
            ConferencesTableSeeder::class,
            EditorshipsTableSeeder::class,

            PublicationGroupTableSeeder::class

        ]);


/*
        //TODO Seeder to implement


*/
    }
}
