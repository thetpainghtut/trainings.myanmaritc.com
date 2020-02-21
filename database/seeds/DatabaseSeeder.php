<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $this->call(CitiesTableSeeder::class);
        $this->call(TownshipsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(EducationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);

    }
}
