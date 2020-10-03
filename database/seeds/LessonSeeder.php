<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessonLists = [
        	array(1, 'Brave Browsere Install ( MAC )', '/storage/video/lesson/1601708401.mov', '175.8', 1, 1, NULL, '2020-10-03 07:00:01', '2020-10-03 07:00:01'),
			array(2, 'XAMPP Installation ( Window )', '/storage/video/lesson/1601708444.mp4', '1019.92', 7, 1, NULL, '2020-10-03 07:00:44', '2020-10-03 07:00:44'),
			array(3, 'XAMPP Installation ( MAC )', '/storage/video/lesson/1601708469.mp4', '837.08', 7, 1, NULL, '2020-10-03 07:01:09', '2020-10-03 07:01:09'),
			array(4, 'Composer Installation ( MAC )', '/storage/video/lesson/1601708505.mp4', '295.6', 10, 1, NULL, '2020-10-03 07:01:45', '2020-10-03 07:01:45'),
			array(5, 'NPM node Installation ( MAC )', '/storage/video/lesson/1601708542.mp4', '217.32', 10, 1, NULL, '2020-10-03 07:02:22', '2020-10-03 07:02:22'),
			array(6, 'Laravel Installation ( MAC )', '/storage/video/lesson/1601708564.mp4', '248.16', 10, 1, NULL, '2020-10-03 07:02:44', '2020-10-03 07:02:44')
        ];

        foreach($lessonLists as $lessonList){
        	$lesson = new Lesson;
	        $lesson->title = $lessonList[1];
	        $lesson->file = $lessonList[2];
	        $lesson->duration = $lessonList[3];
	        $lesson->subject_id = $lessonList[4];
	        $lesson->user_id = $lessonList[5];
	        $lesson->save();
        }

        DB::table('batch_subject')->insert([
            'batch_id' => 1,
            'subject_id' => 1
        ]);
    }
}
