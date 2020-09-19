<?php

use Illuminate\Database\Seeder;
use App\Projecttype;

class ProjecttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $php_projecttypeLists = [
            'Web Design', 'Laravel Project'
        ];

        $android_projecttypeLists = [
        	'Kotlin', 'Flutter'
     	];

        foreach ($php_projecttypeLists as $php_projecttypeList) 
        {
            $projecttype = new Projecttype;
            $projecttype->name = $php_projecttypeList;
            $projecttype->user_id = 1;
            $projecttype->save();

        	$projecttype->courses()->attach('2');
        	$projecttype->courses()->attach('6');

        }

        foreach ($android_projecttypeLists as $android_projecttypeList) 
        {
            $projecttype = new Projecttype;
            $projecttype->name = $android_projecttypeList;
            $projecttype->user_id = 1;
            $projecttype->save();

        	$projecttype->courses()->attach('3');
        }
    }
}
