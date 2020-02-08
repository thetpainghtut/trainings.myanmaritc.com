@extends('template')

@section('content')
<!-- Header -->
  <header class="py-5 mb-5 header_img">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h1 class="display-4 text-white mt-5 mb-2"> Corporate Social Responsibility  </h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
    <!-- ABOUT -->
    <section class="showcase">
      <div class="container-fluid p-0">
          <div class="row no-gutters">
              <div class="col-lg-6 text-white showcase-img" style="background-image: url({{ asset('mmitui/image/activity_one.jpg')}});"></div>
              <div class="col-lg-6 my-auto showcase-text p-5">
                  <h2> PHP Bootcamp Batch 14 Opening Ceremony </h2>
                  <p class="lead mb-0 mmfont"> PHP Bootcamp Batch 14 ဟာဆိုရင်ဖြင့် တနင်္လာနေ့ 20.1.2020 မှာ ကျောင်းသားကျောင်းသူပေါင်း 46 ယောက် နဲ့ စတင်နေပါပြီ။ </p>
              </div>
          </div>
          
          <div class="row no-gutters">
              <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url({{ asset('mmitui/image/activity_two.jpg')}});"></div>
              <div class="col-lg-6 order-lg-1 my-auto showcase-text p-5">
                  <h2> Friday Activity </h2>
                  <p class="lead mb-0 mmfont"> ဒီအပတ်မှာတော့ ဂျပန်အစားအစာ တစ်မျိုးဖြစ်တဲ့ Onigiri ( အိုနိဂိရိ )ကို ဆရာမတွေနဲ့ ကျောင်းသားလေးတွေ စုပေါင်းပြီး ပျော်ပျော်ရွှင်ရွှင် ပြုလုပ်ခဲ့ကြပါတယ်။ </p>
              </div>
          </div>

          <div class="row no-gutters">
              <div class="col-lg-6 text-white showcase-img" style="background-image: url({{ asset('mmitui/image/activity_three.jpg')}});"></div>
              <div class="col-lg-6 my-auto showcase-text p-5">
                  <h2> PHP Bootcamp Batch 12 Graduration </h2>
                  <p class="lead mb-0 mmfont"> January 2020 PHP Bootcamp 12th Batch သင်တန်းလေးဟာ (7. 1. 2020)နေ့လေးမှာ ပျော်ပျော်ရွှင်ရွှင် နှုတ်ဆက်ခဲ့ကြပါတယ်။ ဘွဲ့ယူပြီးကြလို့ လုပ်ငန်းခွင်ဝင်ကြမယ့် fresher လေးတွေရယ် 👨🏻‍🎓👩🏻‍🎓🎓ကျောင်းဆက်တက်ရမယ့်သူတွေရယ် 👨🏻‍💻👩🏻‍💻Developer career life ပြောင်းကြမယ့်သူ 👩🏻‍💼👨🏻‍💼အားလုံးအားလုံး ရှေ့ဆက်လျှောက်မယ့် ခရီးလမ်းမှာ အောင်မြင်မှုများစွာ ဆွတ်ခူးနိုင်ပါစေလို့ Myanmar IT Consulting မှ ဆုမွန်ကောင်းတောင်းပေးလိုက်ပါတယ်</p>
              </div>
          </div>
      </div>
    </section>
    <!-- ABOUT -->
@endsection