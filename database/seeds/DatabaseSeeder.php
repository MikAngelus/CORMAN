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
    	$this->call(AffiliationTableSeeder::class);
    	$this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        //$this->call(JournalsTableSeeder::class);
        //$this->call(ConferencesTableSeeder::class);
        //$this->call(EditorshipsTableSeeder::class);
        $this->call(UserPublicationTableSeeder::class);
        $this->call(UserGroupTableSeeder::class);
        $this->call(UserTopicTableSeeder::class);
        $this->call(TopicGroupTableSeeder::class);
        $this->call(TopicPublicationTableSeeder::class);
        //$this->call(PublicationGroupTableSeeder::class);

    }
}
