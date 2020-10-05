<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postLists = [
			array(1, 'Timetable', '-', '/storage/images/posts/Screen Shot 2020-09-29 at 11.42.42.png,/storage/images/posts/Screen Shot 2020-09-29 at 11.42.52.png,/storage/images/posts/Screen Shot 2020-09-29 at 11.43.01.png', 6, 1, NULL, '2020-10-02 02:56:00', '2020-10-02 02:56:00')
        ];

        foreach($postLists as $postList){
        	$post = new Post();
	        $post->title = $postList[1];
	        $post->content = $postList[2];
	        $post->file = $postList[3];
	        $post->topic_id = $postList[4];
	        $post->user_id = 3;
	        $post->save();

	        DB::table('batch_post')->insert([
	            'batch_id' => 1,
	            'post_id' => $post->id
	        ]);
        }
    }
}
