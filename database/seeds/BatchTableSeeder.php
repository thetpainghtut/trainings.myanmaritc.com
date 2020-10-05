<?php

use Illuminate\Database\Seeder;
use App\Batch;
use Illuminate\Support\Facades\DB;

class BatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batchlists = [
            array(1, 'PHP Batch 18', 'Online', '2020-09-21', '2020-11-20', '9:00 AM - 3:00 PM', 2, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:17:07'),
			array(2, 'PHP Batch 19', 'Online', '2020-10-19', '2020-12-23', '9:00 AM - 3:00 PM', 2, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:22:44'),
			array(3, 'JP Batch 1', 'Offline', '2020-01-02', '2021-01-27', '9:00 AM - 6:00 PM', 6, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:17:07'),
			array(4, 'JP Batch 2', 'Offline', '2020-01-27', '2021-01-27', '9:00 AM - 6:00 PM', 6, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:17:07'),
			array(5, 'JP Batch 3', 'Offline', '2020-03-09', '2021-02-27', '9:00 AM - 6:00 PM', 6, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:17:07'),
			array(6, 'JP Batch 4', 'Offline', '2020-08-05', '2021-05-08', '9:00 AM - 6:00 PM', 6, 1, NULL, '2020-09-28 17:17:07', '2020-09-28 17:17:07')
        ];

        foreach ($batchlists as $batchlist) 
        {
            $batch = new Batch;
            $batch->title = $batchlist[1];
            $batch->type = $batchlist[2];
            $batch->startdate = $batchlist[3];
            $batch->enddate =  $batchlist[4];
            $batch->time =  $batchlist[5];
            $batch->course_id =  $batchlist[6];
            $batch->location_id =  $batchlist[7];
            $batch->save();
        }

        DB::table('batch_mentor')->insert([
            'batch_id' => 1,
            'mentor_id' => 3
        ]);

        DB::table('batch_mentor')->insert([
            'batch_id' => 1,
            'mentor_id' => 5
        ]);

        DB::table('batch_mentor')->insert([
            'batch_id' => 1,
            'mentor_id' => 6
        ]);

        DB::table('batch_mentor')->insert([
            'batch_id' => 2,
            'mentor_id' => 1
        ]);

        DB::table('batch_mentor')->insert([
            'batch_id' => 2,
            'mentor_id' => 2
        ]);

        DB::table('batch_mentor')->insert([
            'batch_id' => 2,
            'mentor_id' => 4
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 1,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 1,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 1,
            'teacher_id' => 3
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 1,
            'teacher_id' => 4
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 1,
            'teacher_id' => 5
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 2,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 2,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 2,
            'teacher_id' => 3
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 2,
            'teacher_id' => 4
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 2,
            'teacher_id' => 5
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 3
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 14
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 15
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 16
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 3,
            'teacher_id' => 17
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 14
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 15
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 16
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 4,
            'teacher_id' => 17
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 3
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 4
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 5
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 14
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 15
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 16
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 5,
            'teacher_id' => 17
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 1
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 2
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 3
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 4
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 5
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 14
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 15
        ]);
        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 16
        ]);

        DB::table('batch_teacher')->insert([
            'batch_id' => 6,
            'teacher_id' => 17
        ]);
    }
}
