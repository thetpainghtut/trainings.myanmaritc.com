<?php

use Illuminate\Database\Seeder;
use App\Subject;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $php_jp_subjectLists = [
            array("Web Basic", "/storage/images/subjects/domain.png"),
            array("HTML", "/storage/images/subjects/html.png"),
            array("CSS", "/storage/images/subjects/css.png"),
            array("JavaScript", "/storage/images/subjects/js.png"),
            array("JQuery", "/storage/images/subjects/jq.png"),
            array("Bootstrap", "/storage/images/subjects/bootstrap.png"),
            array("PHP", "/storage/images/subjects/php.png"),
            array("MySQL", "/storage/images/subjects/mysql.png"),
            array("OOP & MVC", "/storage/images/subjects/browser.jpg"),
            array("Laravel", "/storage/images/subjects/laravel.png"),
            array("API", "/storage/images/subjects/api.png"),
            array("Vue", "/storage/images/subjects/vue.png"),
            //13
            array("UI / UX", "/storage/images/subjects/front-end.png"),
            array("GitHub", "/storage/images/subjects/front-end.png"),

        ];

        $php_subjectLists = [
            //15
            array("Project Management", "/storage/images/subjects/project-management.png")
        ];

        $android_subjectLists = [
            array("Kotlin", "/storage/images/subjects/kotlin.png"),
            array("Flutter", "/storage/images/subjects/flutter.png"),
            // 18
            array("Java", "/storage/images/subjects/java.png")

        ];

        $programmingfundamental_subjectLists = [
            array("C#", "/storage/images/subjects/c1.png"),
            array("C++", "/storage/images/subjects/c2.png")
        ];

        $jp_subjectLists = [
            array("Database Design and Development", "/storage/images/subjects/database.png"),
            // 22
            array("Python", "/storage/images/subjects/python.png"),
            array("Japan", "/storage/images/subjects/japan.png"),
            array("Wordpress", "/storage/images/subjects/wordpress.png")
        ];

        $hr_subjectLists = [
            array("Microsoft Word", "/storage/images/subjects/microsoft-word.png"),
            array("Microsoft Excel", "/storage/images/subjects/microsoft-excel.png"),
            array("Microsoft Powerpoint", "/storage/images/subjects/microsoft-powerpoint.png"),
            array("HR", "/storage/images/subjects/hr.png"),
            // 29
            array("Photoshop", "/storage/images/subjects/photoshop.png")
        ];
        $ios_subjectLists = [
            array("Swift", "/storage/images/subjects/swift.png")
        ];

        foreach ($php_jp_subjectLists as $php_jp_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $php_jp_subjectList[0];
            $subject->logo = $php_jp_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(2);
        	$subject->courses()->attach(6);

        }

        foreach ($php_subjectLists as $php_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $php_subjectList[0];
            $subject->logo = $php_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(2);

        }

        foreach ($android_subjectLists as $android_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $android_subjectList[0];
            $subject->logo = $android_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(3);
        }

        foreach ($programmingfundamental_subjectLists as $programmingfundamental_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $programmingfundamental_subjectList[0];
            $subject->logo = $programmingfundamental_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(5);
        }

        DB::table('course_subject')->insert([
            'course_id' => 5,
            'subject_id' => 18
        ]);

        foreach ($jp_subjectLists as $jp_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $jp_subjectList[0];
            $subject->logo = $jp_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(6);
        }

        foreach ($hr_subjectLists as $hr_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $hr_subjectList[0];
            $subject->logo = $hr_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(1);
        }

        DB::table('course_subject')->insert([
            'course_id' => 2,
            'subject_id' => 29
        ]);

        foreach ($ios_subjectLists as $ios_subjectList) 
        {
            $subject = new Subject;
            $subject->name = $ios_subjectList[0];
            $subject->logo = $ios_subjectList[1];
            $subject->save();

        	$subject->courses()->attach(4);
        }

        DB::table('course_subject')->insert([
            'course_id' => 7,
            'subject_id' => 22
        ]);

        DB::table('course_subject')->insert([
            'course_id' => 8,
            'subject_id' => 22
        ]);
    }
}
