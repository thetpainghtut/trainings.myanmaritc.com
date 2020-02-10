<?php

use Illuminate\Database\Seeder;

class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('education')->insert([
            'name'      => 'BE-IT',
            'user_id'   =>  '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);


         DB::table('education')->insert([
            'name'      => 'B.C.Sc',
            'user_id'   =>  '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
