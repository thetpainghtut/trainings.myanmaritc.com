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

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(CountryTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(TownshipsTableSeeder::class);

        $this->call(LocationsTableSeeder::class);
        $this->call(EducationsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ProjecttypesTableSeeder::class);

        $this->call(StaffsTableSeeder::class);

        $this->call(SubjectsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);

        $this->call(BatchTableSeeder::class);
        $this->call(InquireTableSeeder::class);
        
    }
}
