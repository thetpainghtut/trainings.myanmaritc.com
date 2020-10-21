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
        $topicLists = [
            'Announcement', 'Assignment', 'Live Recording', 'Post', 'Project Title', 'Schedule', 'Survey','Quiz'
        ];

        foreach ($topicLists as $topicList) 
        {
            $topic = new Topic;
            $topic->name = $topicList;
            $topic->user_id = 1;
            $topic->save();
        }
    }
}
