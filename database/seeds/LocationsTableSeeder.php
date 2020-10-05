<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //တိုက္အမွတ္ (၁၆၉)၊ အခန္းနံပါတ္ 8/A၊ MTP ကြန္ဒို၊ လွည္းတန္း - အင္းစိန္လမ္းမၾကီး၊ ၉ ရပ္ကြက္၊ လိႈင္ျမိဳ႕နယ္၊ ရန္ကုန္ျမိဳ႕
        DB::table('locations')->insert([
            'name'       => 'တိုက်အမှတ် (၁၆၉)၊ အခန်းနံပါတ် 8/A၊ MTP ကွန်ဒို၊ အင်းစိန်လမ်းမကြီး၊ ၉ ရပ်ကွက်၊ လှိုင်မြို့နယ်။',
            'city_id'    => '14',
            'user_id'    => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //တိုက္အမွတ္ (29 A/ 5A) ၊ No.1 Beauty Saloon အေပၚထပ္ ၅ လႊာ ၊ ခိုင္ေရႊ၀ါလမ္း လွည္းတန္း။
        DB::table('locations')->insert([
            'name'       => 'တိုက်အမှတ် (29 A/ 5A) ၊ No.1 Beauty Saloon အပေါ်ထပ် ၅ လွှာ ၊ ခိုင်ရွှေဝါလမ်း လှည်းတန်း။',
            'city_id'    => '14',
            'user_id'    => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //လမ္း ၄၀ ၊ ၇၀x ၇၁ ၾကား ၊ ၀ါၿမဲ Learning Center
        DB::table('locations')->insert([
            'name'       => 'လမ်း ၄၀ ၊ ၇၀x ၇၁ ကြား ၊ ဝါမြဲ Learning Center။',
            'city_id'    => '8',
            'user_id'    => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
