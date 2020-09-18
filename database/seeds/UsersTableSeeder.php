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
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('mic@123');
        $user->save();
        $user->assignRole('Admin');

        $teacherLists = [
            // php
            array("Thet Paing Htut", "thetpainghtut.bf@gmail.com"),
            array("Ya Thaw Myat Noe", "yathawmyatnoe007@gmail.com"),
            array("Hein Min Htet", "heinminhtet8138@gmail.com"),
            array("Min Pike Hmu", "minpikehmu10@gmail.com"),
            array("Kyaw Zin Aung", "ukza11977296@gmail.com"),

            // android
            array("Aung Zin Phyo", "aungzinphyo94@gmail.com"),

            // ios
            array("Min Aung Hein", "minaunghein@gmail.com"),
            
            // hr
            array("Pyae Phyo Khaing", "pyaephyokhaing@gmail.com"),
            array("July Oo", "julyoo@gmail.com"),
            array("Thi Dar Htut", "thidarhtut@gmail.com"),

            array("Phyu Phyu Khaing Aye", "phyuphyukhaingaye@gmail.com"),
            array("Thuzar Myint", "thuzarmyint@gmail.com"),
            array("Kyi Kyi Swe", "kyikyiswe@gmail.com"),

            // jpit
            array("JP Teacher One", "jpteacherone@gmail.com"),
            array("JP Teacher Two", "jpteachertwo@gmail.com"),
            array("JP Teacher Three", "jpteachero@gmail.com"),
            array("Yee Wai Khaing", "yeewaikhaing@gmail.com")
        
        ];

        $mentorLists = [
            array("Aye Lwin Soe", "ayelwinsoe.it2018@gmail.com"),
            array("Honey Htun", "hannihtun195@gmail.com"),
            array("Aye Chan Oo", "chanlaymaymay23@gmail.com"),
            array("Nyi Ye Lin", "nyiyelin4@gmail.com"),
            array("Kyawt Yin Win", "kyawtyinwin@gmail.com"),
            array("Hnin Ei Phyu", "hnineiphyu@gmail.com"),
            array("Kaung Myat Thway", "kaungmyatthway@gmail.com"),

            array("Chan Ei Hmwe", "chaneihmweit@gmail.com"),
            array("Si Thu Aung", "sithuaung192@gmail.com"),

            array("May Zin Phyo", "mayzinphyo@gmail.com"),
            
        ];


        foreach ($teacherLists as $teacherList) 
        {
            $teacher = new User;
            $teacher->name = $teacherList[0];
            $teacher->email = $teacherList[1];
            $teacher->password = Hash::make('123456789');
            $teacher->save();
            $teacher->assignRole('Teacher');
        }

        foreach ($mentorLists as $mentorList) 
        {
            $mentor = new User;
            $mentor->name = $mentorList[0];
            $mentor->email = $mentorList[1];
            $mentor->password = Hash::make('123456789');
            $mentor->save();
            $mentor->assignRole('Mentor');
        }
    }
}
