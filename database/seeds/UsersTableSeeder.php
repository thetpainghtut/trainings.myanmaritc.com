<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User;
      $user->name = 'Admin';
      $user->email = 'admintwo@gmail.com';
      $user->password = Hash::make('123456789');
      $user->save();
      $user->assignRole('Admin');
    }
}
