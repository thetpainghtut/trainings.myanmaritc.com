<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Education;


class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationLists = [ 
            // CU
            array("CU (Hinthada)", "CU"),
            array("CU (Pathein)", "CU"),
            array("CU (Pyay)", "CU"),
            array("CU (Taungoo)", "CU"),
            array("CU (Bhamo)", "CU"),
            array("CU (Myitkyina)", "CU"),
            array("CU (Loikaw)", "CU"),
            array("CU (Hpa-An)", "CU"),
            array("CU (Mandalay)", "CU"),
            array("CU (Meiktila)", "CU"),
            array("CU (Thaton)", "CU"),
            array("CU (Sittwe)", "CU"),
            array("CU (Kalay)", "CU"),
            array("CU (Monywa)", "CU"),
            array("CU (Lashio)", "CU"),
            array("CU (Kyaingtong)", "CU"),
            array("CU (Panglong)", "CU"),
            array("CU (Taunggyi)", "CU"),
            array("CU (Dawei)", "CU"),
            array("CU (Myeik)", "CU"),
            array("CU (Yangon)", "CU"),
            array("CU (Magway)", "CU"),
            array("CU (Pakokku)", "CU"),
            array("CU (Maubin)", "CU"),

            // TU
            array("TU (Hinthada)", "TU"),
            array("TU (Maubin)", "TU"),
            array("TU (Pathein)", "TU"),
            array("TU (Pyay)", "TU"),
            array("TU (Taungoo)", "TU"),
            array("TU (Bhamo)", "TU"),
            array("TU (Myitkyina)", "TU"),
            array("TU (Loikaw)", "TU"),
            array("TU (Hpa-An)", "TU"),
            array("TU (Magway)", "TU"),
            array("TU (Pakokku)", "TU"),
            array("TU (Mandalay)", "TU"),
            array("TU (Kyaukse)", "TU"),
            array("TU (Meiktila)", "TU"),
            array("TU (Mawlamyine)", "TU"),
            array("TU (Sittwe)", "TU"),
            array("TU (Sagaing)", "TU"),
            array("TU (Monywa)", "TU"),
            array("TU (Kalay)", "TU"),
            array("TU (Kyaingtong)", "TU"),
            array("TU (Lashio)", "TU"),
            array("TU (Panglong)", "TU"),
            array("TU (Taunggyi)", "TU"),
            array("TU (Dawei)", "TU"),
            array("TU (Myeik)", "TU"),
            array("TU (Hmawbi)", "TU"),
            array("TU (Thanlyin)", "TU"),
            array("TU (West Yangon)", "TU"),
            array("TU (Yangon)", "TU"),

            // Private
            array("KMD", "Private"),
            array("Gusto", "Private"),
            array("Info Myanmar", "Private"),
            array("MCC", "Private"),
            array("STI", "Private"),
            array("YIU", "Private"),
            array("Y-Max", "Private"),
            array("Strategy First", "Private"),
            array("MMC", "Private"),
            array("MIU", "Private"),


            // Government
            array("Hinthada University", "Government"),
            array("Maubin University", "Government"),
            array("Pathein University", "Government"),
            array("Pyay University", "Government"),
            array("Taungoo University", "Government"),
            array("Bhamo University", "Government"),
            array("Myitkyina University", "Government"),
            array("Loikaw University", "Government"),
            array("Hpa-An University", "Government"),
            array("Magway University", "Government"),
            array("Pakokku University", "Government"),
            array("Yenangyaung University", "Government"),
            array("University of Mandalay", "Government"),
            array("Meiktila University", "Government"),
            array("Yadanabon University", "Government"),
            array("Mawlamyine University", "Government"),
            array("Sittwe University", "Government"),
            array("Monywa University", "Government"),
            array("Shwebo University", "Government"),
            array("University of Kalay", "Government"),
            array("Lashio University", "Government"),
            array("Kyaingtong University", "Government"),
            array("Taunggyi University", "Government"),
            array("Dawei University", "Government"),
            array("Myeik University", "Government"),
            array("Dagon University", "Government"),
            array("Yangon University of Distance Education", "Government"),
            array("Mandalay University of Distance Education", "Government"),
            array("University of East Yangon", "Government"),
            array("University of Foreign Languages, Yangon", "Government"),
            array("University of Information Technology, Yangon", "Government"),
            array("University of West Yangon", "Government"),
            array("Yangon University", "Government"),


            // Other
            array("Under Graduate", "Other"),
            array("Post Graduate", "Other")


        ];

        foreach ($educationLists as $educationList) 
        {
            $education = new Education;
            $education->name = $educationList[0];
            $education->type = $educationList[1];
            $education->user_id = 1;
            $education->save();
        }

        // Type => CU, TU, Private, Government, Other


    }
}
