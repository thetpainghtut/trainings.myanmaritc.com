<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert([
            'name'      => 'Yangon',
            'user_id'   =>  '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Mandalay
        DB::table('cities')->insert([
            'name'      => 'Mandalay',
            'user_id'   =>  '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
