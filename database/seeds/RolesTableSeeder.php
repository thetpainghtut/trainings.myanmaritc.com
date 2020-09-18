<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('roles')->insert([
            'name'      => 'Admin',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'Mentor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'Intern Mentor',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('roles')->insert([
            'name'      => 'Teacher',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'HR',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'Business Development',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'Recruitment',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'      => 'Student',
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
