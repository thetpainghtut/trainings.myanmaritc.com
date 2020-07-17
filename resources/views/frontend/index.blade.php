@extends('template')
@section('content')
    <!-- Header -->
  <header class="py-5 mb-5 header_img">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-8 col-md-12 col-sm-12 order-lg-1 order-md-2 order-sm-2">
          <h1 class="display-4 text-white mt-5 mb-2"> Myanmar <span style="color: #f5a40c; text-decoration:underline"> IT </span> </h1>
          <p class="lead mb-5 text-white mmfont">  အိုင်တီလမ်းကြောင်းပေါ်လျှောက်လှမ်းချင်တဲ့ ကျောင်းသားလူငယ်လေးတွေ လိုအပ်တဲ့အရည်အချင်းတွေဖြည့်တင်းပြီး လုပ်ငန်းခွင်ထဲ အရည်အချင်းအချင်းရှိရှိနဲ့ ဝင်ရောက်နိုင်ဖို့ အကောင်းဆုံးကြိုးစားပေးမည် MMIT </p>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order-md-1 order-sm-1">
          <img src="{{ asset('mmitui/image/header.png')}}" class="img-fluid">
        </div>
      </div>
    </div>
  </header>
  @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <!-- Page Content -->
    <!-- ABOUT -->
    <div class="container">

      <div class="row">
        <div class="col-md-12 mb-5">
          <h4 class="mmfont"> Myanmar IT Consulting ၏ အားသာချက်များ </h4>
          <hr class="mb-5">
          <div class="my-3">
            <span class="fa-stack icon" style="vertical-align: top;">
              <i class="far fa-circle fa-stack-2x"></i>
              <i class="fas fa-award fa-stack-1x"></i>
            </span>
            <span class="mmfont pt-5">
              အသီးသီးသော သင်တန်းများ ပြီးဆုံး သည်နှင့် အလုပ်တန်းဝင်နိုင်အောင် လေ့ကျင့်သင်ကြားပေးခြင်း။
            </span>
          </div>

          <div class="my-3">
            <span class="fa-stack icon" style="vertical-align: top;">
              <i class="far fa-circle fa-stack-2x"></i>
              <i class="fas fa-file-alt fa-stack-1x"></i>
            </span>
            <span class="mmfont pt-5">
              အလုပ်လျှောက်ရန် CV Form မှစပြီး အင်တာဗျုးဖြေနည်းအထိ လိုအပ်သည်များကို ပြင်ဆင်ပေးခြင်း။
            </span>
          </div>

          <div class="my-3">
            <span class="fa-stack icon" style="vertical-align: top;">
              <i class="far fa-circle fa-stack-2x"></i>
              <i class="fas fa-handshake fa-stack-1x"></i>
            </span>
            <span class="mmfont pt-5">
              Myanmar IT နှင့်ချိတ်ဆက်ထားသော Company များတွင် အလုပ်ဝင်နိုင်ရန် ချိတ်ဆက်ပေးခြင်း။
            </span>
          </div>

          <div class="my-3">
            <span class="fa-stack icon" style="vertical-align: top;">
              <i class="far fa-circle fa-stack-2x"></i>
              <i class="fas fa-id-badge fa-stack-1x"></i>
            </span>
            <span class="mmfont pt-5">
              အလုပ်လိုချင်သော လူငယ်များအား အကောင်းဆုံးသော အလုပ်အကိုင်အခွင့်အလမ်းများ ဖန်တီးပေးနိုင်ခြင်း။
            </span>
          </div>

        </div>
      </div>
    </div>
    <!-- ABOUT -->


    <!-- COURSE -->
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px">
      <section class="secondary">
        <div class="container py-5">
          <div class="row mt-5">

            <div class="col-12 text-center mb-3">
              <h1> Our Courses </h1>
            </div>
            <div class="offset-2 col-8 offset-2">
              <p class="mmfont text-center">
                Myanmar IT သည် အိုင်တီနည်းပညာသင်တန်းများကို ၂၀၁၅ အောက်တိုဘာလမှ စတင်ဖွင့်လှစ်သင်ကြားပေးနေသော သင်တန်းကျောင်းတစ်ခုဖြစ်ပါသည်။ 
              </p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0001')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_one.png')}}" class="img-fluid">
                <p class="mt-4"> HR/Admin Office Staff Training </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0002')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_two.png')}}" class="img-fluid">
                <p class="mt-4"> Programming Fundamental </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0003')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_three.png')}}" class="img-fluid">
                <p class="mt-4"> PHP Developer Bootcamp </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0004')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_four.png')}}" class="img-fluid">
                <p class="mt-4"> Modern Android Bootcamp </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0005')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_five.png')}}" class="img-fluid">
                <p class="mt-4"> Python Training </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0006')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_six.png')}}" class="img-fluid">
                <p class="mt-4"> iOS Development </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0007')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_seven.png')}}" class="img-fluid">
                <p class="mt-4"> Japanese & IT Bootcamp </p>
              </a> 
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 text-center my-5 programming_logo_card">
              <a href="{{route('course_detail_bycodeno','0008')}}" class="programming_logo">
                <img src="{{ asset('mmitui/image/course_eight.png')}}" class="img-fluid">
                <p class="mt-4"> Japan N5 Class </p>
              </a> 
            </div>
            
          </div>
        </div>
      </section>
    </div>
    <!-- COURSE -->
@endsection