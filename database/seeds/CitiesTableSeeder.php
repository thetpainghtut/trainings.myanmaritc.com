<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citylists = [
            array('Ayeyarwady', 'ဧရာဝတီတိုင်းဒေသကြီး', '10'),
            array('Bago', 'ပဲခူးတိုင်းဒေသကြီး', '08'),
            array('Chin', 'ချင်းပြည်နယ်', '03'),
            array('Kachin', 'ကချင်ပြည်နယ်', '01'),
            array('Kayah', 'ကယားပြည်နယ်', '09'),
            array('Kayin', 'ကရင်ပြည်နယ်', '13'),
            array('Magway', 'မကွေးတိုင်းဒေသကြီး', '04'),
            array('Mandalay', 'မန္တလေးတိုင်းဒေသကြီး', '05'),
            array('Mon', 'မွန်ပြည်နယ်', '12'),
            array('Rakhine', 'ရခိုင်ပြည်နယ်', '07'),
            array('Shan', 'ရှမ်းပြည်နယ်', '06'),
            array('Sagaing', 'စစ်ကိုင်းတိုင်းဒေသကြီး', '02'),
            array('Tanintharyi', 'တနင်္သာရီတိုင်းဒေသကြီး', '14'),
            array('Yangon', 'ရန်ကုန်တိုင်းဒေသကြီး', '11'),
            array('Nay Pyi Taw', 'နေပြည်တော်', '15')
        ];

        foreach ($citylists as $citylist) 
        {
            $city = new City;
            $city->name = $citylist[0];
            $city->mmr_name = $citylist[1];
            $city->zipcode = $citylist[2];
            $city->country_id = 146;
            $city->user_id = 1;
            $city->save();
        }
    }
}
