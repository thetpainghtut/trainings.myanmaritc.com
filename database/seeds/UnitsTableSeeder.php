<?php

use Illuminate\Database\Seeder;
use App\Unit;


class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitLists = [
            'Basic Requirement', 'Design Concepts ( UI / UX )', 'Database Knowledges ( MySQL )', 'Java Basic', 'Web App Frameworks ( CodeIgniter, Laravel )', 'Logical Thinking', 'Problem Solving'
        ];

        foreach ($unitLists as $unitList) 
        {
            $unit = new Unit;
            $unit->description = $unitList;
            $unit->course_id = 2;
            $unit->save();
        }
    }
}
