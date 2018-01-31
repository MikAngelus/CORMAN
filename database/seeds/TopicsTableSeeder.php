<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $topic1 = new Topic;
        $topic1->name = 'Politics';
        $topic1->save();

		$topic2 = new Topic;
        $topic2->name = 'Technology';
        $topic2->save();

        $topic3 = new Topic;
        $topic3->name = 'Entrepreneurship';
        $topic3->save();

		$topic4 = new Topic;
        $topic4->name = 'Life';
        $topic4->save();

        $topic5 = new Topic;
        $topic5->name = 'Startup';
        $topic5->save();

        $topic6 = new Topic;
        $topic6->name = 'User Experience';
        $topic6->save();

        $topic7 = new Topic;
        $topic7->name = 'Marketing';
        $topic7->save();

        $topic8 = new Topic;
        $topic8->name = 'Artificial Intelligence';
        $topic8->save();

        $topic9 = new Topic;
        $topic9->name = 'Philosophy';
        $topic9->save();

        $topic10 = new Topic;
        $topic10->name = 'Design';
        $topic10->save();

        $topic11 = new Topic;
        $topic11->name = 'Business';
        $topic11->save();

        $topic12 = new Topic;
        $topic12->name = 'Writing';
        $topic12->save();

        $topic13 = new Topic;
        $topic13->name = 'Google';
        $topic13->save();

        $topic14 = new Topic;
        $topic14->name = 'Comics';
        $topic14->save();

        $topic15 = new Topic;
        $topic15->name = 'Education';
        $topic15->save();

        $topic16 = new Topic;
        $topic16->name = 'Art';
        $topic16->save();

        $topic16 = new Topic;
        $topic16->name = 'Photography';
        $topic16->save();

        $topic17 = new Topic;
        $topic17->name = 'Innovation';
        $topic17->save();

		$topic18 = new Topic;
        $topic18->name = 'Mobile app';
        $topic18->save();

        $topic19 = new Topic;
        $topic19->name = 'Developers';
        $topic19->save();

        $topic20 = new Topic;
        $topic20->name = 'Science';
        $topic20->save();

    }
}
