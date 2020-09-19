<?php

use Illuminate\Database\Seeder;
use App\Staff;
use App\Teacher;
use App\Mentor;

use App\User;


class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        // PHP
        for($a = 2; $a <= 6; $a++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 1;
            $staff->user_id = $a;
            $staff->save();

            $teacher=new Teacher;
            $teacher->staff_id=$staff->id;
            $teacher->course_id=2;
            $teacher->degree='Degree Something';
            $teacher->save();

        	$user=User::find($a);
        	$user->assignRole('Teacher');

        }

        // android
	        $staff = new Staff;
	        $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->fathername = $faker->name;
	        $staff->nrc = '12/ASaNa(N)777777';
	        $staff->phone = $faker->phoneNumber;
	        $staff->photo = $faker->imageUrl($width = 640, $height = 480);
	        $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->location_id = 1;
	        $staff->user_id = 7;
	        $staff->save();

	        $teacher=new Teacher;
	        $teacher->staff_id=$staff->id;
	        $teacher->course_id=3;
	        $teacher->degree='Degree Something';
	        $teacher->save();

	    	$user=User::find(7);
	    	$user->assignRole('Teacher');

    	// iOS
	        $staff = new Staff;
	        $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->fathername = $faker->name;
	        $staff->nrc = '12/ASaNa(N)777777';
	        $staff->phone = $faker->phoneNumber;
	        $staff->photo = $faker->imageUrl($width = 640, $height = 480);
	        $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->location_id = 1;
	        $staff->user_id = 8;
	        $staff->save();

	        $teacher=new Teacher;
	        $teacher->staff_id=$staff->id;
	        $teacher->course_id=4;
	        $teacher->degree='Degree Something';
	        $teacher->save();

	    	$user=User::find(8);
	    	$user->assignRole('Teacher');

        // HR
	    	$staff = new Staff;
	        $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->fathername = $faker->name;
	        $staff->nrc = '12/ASaNa(N)777777';
	        $staff->phone = $faker->phoneNumber;
	        $staff->photo = $faker->imageUrl($width = 640, $height = 480);
	        $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
	        $staff->location_id = 1;
	        $staff->user_id = 9;
	        $staff->save();

	        $teacher=new Teacher;
	        $teacher->staff_id=$staff->id;
	        $teacher->course_id=1;
	        $teacher->degree='Degree Something';
	        $teacher->save();

	    	$user=User::find(9);
	    	$user->assignRole('Teacher');

        for($b = 10; $b <= 11; $b++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 2;
            $staff->user_id = $b;
            $staff->save();

            $teacher=new Teacher;
            $teacher->staff_id=$staff->id;
            $teacher->course_id=1;
            $teacher->degree='Degree Something';
            $teacher->save();

        	$user=User::find($b);
        	$user->assignRole('Teacher');

        }

        for($c = 12; $c <= 14; $c++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 3;
            $staff->user_id = $c;
            $staff->save();

            $teacher=new Teacher;
            $teacher->staff_id=$staff->id;
            $teacher->course_id=1;
            $teacher->degree='Degree Something';
            $teacher->save();

        	$user=User::find($c);
        	$user->assignRole('Teacher');
        }

        // Japan & IT
        for($d = 15; $d <= 18; $d++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 1;
            $staff->user_id = $d;
            $staff->save();

            $teacher=new Teacher;
            $teacher->staff_id=$staff->id;
            $teacher->course_id=6;
            $teacher->degree='Degree Something';
            $teacher->save();

        	$user=User::find($d);
        	$user->assignRole('Teacher');
        }

        // php - mentor
        for($e = 19; $e <= 25; $e++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 1;
            $staff->user_id = $e;
            $staff->save();

            $mentor = new Mentor;
	        $mentor->staff_id=$staff->id;
	        $mentor->course_id=2;
	        $mentor->portfolio = 'Portfolio Something';
	        $mentor->degree = 'Degree Something';
	        $mentor->save();

        	$user=User::find($e);
        	$user->assignRole('Mentor');
        }

        // php - mentor
        for($f = 26; $f <= 27; $f++) 
        {
        	$staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 1;
            $staff->user_id = $f;
            $staff->save();

            $mentor = new Mentor;
	        $mentor->staff_id=$staff->id;
	        $mentor->course_id=3;
	        $mentor->portfolio = 'Portfolio Something';
	        $mentor->degree = 'Degree Something';
	        $mentor->save();

        	$user=User::find($f);
        	$user->assignRole('Mentor');
        }

        $staff = new Staff;
            $staff->dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->fathername = $faker->name;
            $staff->nrc = '12/ASaNa(N)777777';
            $staff->phone = $faker->phoneNumber;
            $staff->photo = $faker->imageUrl($width = 640, $height = 480);
            $staff->joineddate = $faker->date($format = 'Y-m-d', $max = 'now');
            $staff->location_id = 1;
            $staff->user_id = 28;
            $staff->save();

            $mentor = new Mentor;
	        $mentor->staff_id=$staff->id;
	        $mentor->course_id=6;
	        $mentor->portfolio = 'Portfolio Something';
	        $mentor->degree = 'Degree Something';
	        $mentor->save();

        	$user=User::find(28);
        	$user->assignRole('Mentor');
    }
}
