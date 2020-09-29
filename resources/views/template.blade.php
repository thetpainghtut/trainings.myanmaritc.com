<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title> Myanmar IT Consulting </title>

    <link rel="icon" href="{{ asset('mmitui/image/favicon.jpg')}}" type="image/jpg" sizes="16x16">

    <!-- Custom Font -->
    <link href="{{ asset('mmitui/css/font.css')}}" rel="stylesheet">

    <link href="{{ asset('mmitui/css/custom.css')}}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('mmitui/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('mmitui/css/business-frontpage.css')}}" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/fontawesome/css/all.min.css')}}">

    <!-- Hover -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/css/hover.css') }}">

    <!-- Photo Grid -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/photogrid/images-grid.css') }}">

    <!-- Icofont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/icofont/icofont.min.css') }}">

    <!-- AOS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/aos/aos.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/owlcarousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/owlcarousel/assets/owl.theme.default.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('sb_admin2/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sb_admin2/vendor/select2_bootstrap4/dist/select2-bootstrap4.min.css') }}">

    <!-- Plyr -->
    {{-- <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/demo.css" /> --}}

</head>

{{-- <body oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;"> --}}
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('mmitui/image/logo.jpg') }}" class="img-fluid" style="width: 120px; height: 50px">
            </a>
          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::segment(1) ===null ? 'active' :'' }}">
                        <a class="nav-link" href="{{ route('frontend.index') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                  
                    <li class="nav-item {{ Request::segment(1) ==='csr' ? 'active' :'' }}">
                        <a class="nav-link" href="{{ route('frontend.csr') }}">CSR</a>
                    </li>
                  
                    <li class="nav-item {{ Request::segment(1) ==='allcourses' ? 'active' :'' }} {{ Request::segment(1) ==='course_detail' ? 'active' :'' }}">
                        <a class="nav-link" href="{{ route('frontend.courses') }}">Course</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="http://jobs.myanmaritc.com/" target="_blank"> Job </a>
                    </li>
                  
                    <li class="nav-item {{ Request::segment(1) ==='contact' ? 'active' :'' }}">
                        <a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a>
                    </li>
                  
                  
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                    </li>
                    
                    @else

                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-4">
                                        @if(Auth::user()->student)
                                            @if(Auth::user()->student->photo)
                                                <img src="{{Auth::user()->student->photo}}" class="img-fluid">
                                            @else
                                                <img src="{{ asset('mmitui/image/user.png') }}" class="img-fluid">
                                            @endif
                                        @else
                                            <img src="{{ asset('mmitui/image/user.png') }}" class="img-fluid">
                                        @endif
                                    </div>
                                  <div class="col-8">
                                      <p class="text-left">
                                        <strong> {{Auth::user()->name}} </strong>
                                      </p>
                                      <p class="text-left small">
                                        {{Auth::user()->email}}
                                      </p>
                                  </div>
                                </div>
                            </div>
                          
                            <div class="dropdown-divider"></div>
                          
                            <a class="dropdown-item" href="{{ route('frontend.account') }}"> My Account </a>


                            <a class="dropdown-item" href="{{ route('frontend.panel') }}"> 
                                My Dashboard 
                            </a>

                            <a class="dropdown-item" href="{{ route('frontend.secret') }}"> Change Password </a>

                            <a class="dropdown-item" href="{{ route('frontend.notification')}}"> Notifications 
                                <span class="badge badge-pill badge-danger"> +1 </span> 
                            </a>

                            <div class="dropdown-divider"></div>


                            <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout
                             </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation -->


    <!-- /.Page Content -->
    <div id="page-content">
  
        @yield('content')

        <!-- New Course -->
        <div class="container-fluid" id="newcourse_ad">
            <div class="row p-5">
                <div class="container">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    
                        <div class="carousel-inner">
                            @if(count($batches)>0)
                            @php $i=0; @endphp
                            @foreach($batches as $batch)
                            @php
                                $now = Carbon\Carbon::now();

                                if($batch){
                                    $date = date('d-M-Y',strtotime($batch->startdate));
                                    if($now < $batch->startdate){
                            @endphp

                            <div class="carousel-item @if($i==0) {{'active'}} @endif">
                                <h1 class="text-center my-5"> Upcoming Course </h1>

                                <p>{{$batch->course->name}} </p>
                                {{-- <small> {{$batch->location->name}} </small> --}}
                                {{-- <p>{{$batch->location->city->name}}</p> --}}
                                <b class="d-block">{{$date}}</b>

                                <div class="row">
                                    <div class="offset-4 col-4 offset-4">
                                        <a class="btn btn-block btn-primary mt-5 hvr-icon-grow-rotate" href="tel:+95798323199"> Call Now <i class="fas fa-phone-alt ml-3 hvr-icon"></i> </a>
                                    </div>
                                </div>

                            </div>      

                            @php $i++; } else{  @endphp

                            <div class="carousel-item @if($i==0) {{'active'}} @endif">
                                {{-- <p> No class now</p>                    

                                <div class="row">
                                    <div class="offset-4 col-4 offset-4">
                                        <a class="btn btn-block btn-primary mt-5 hvr-icon-grow-rotate" href="tel:+95798323199"> Call Now <i class="fas fa-phone-alt ml-3 hvr-icon"></i> </a>
                                    </div>
                                </div> --}}
                            </div>  

                            @php }; }else{ @endphp
                    
                            <div class="carousel-item @if($i==0) {{'active'}} @endif">
                                {{-- <p> No class now</p>                    

                                <div class="row">
                                    <div class="offset-4 col-4 offset-4">
                                        <a class="btn btn-block btn-primary mt-5 hvr-icon-grow-rotate" href="tel:+95798323199"> Call Now <i class="fas fa-phone-alt ml-3 hvr-icon"></i> </a>
                                    </div>
                                </div> --}}

                            </div> 
                        
                            @php }; @endphp
                            @endforeach
                            @else
                        
                                <div class="carousel-item @if($i==0) {{'active'}} @endif">
                                    <p> No class now</p>                    

                                    <div class="row">
                                        <div class="offset-4 col-4 offset-4">
                                            <a class="btn btn-block btn-primary mt-5" href="tel:+95798323199"> Call Now </a>
                                        </div>
                                    </div>

                                </div> 
                            @endif
                      
                        </div>

                    </div>
                  
                </div>
            </div>
        </div>
        <!-- New Course -->


        <!-- Client -->
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-12 text-center mb-5" >
                    <h2> Our Clients </h2>
                </div>
            </div>

            <section class="customer-logos slider mt-5">
                <div class="slide">
                    <a href="https://www.nttdata.com/global/en/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientone.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="https://www.xan.com.mm/" target="_blank">
                        <img src="{{ asset('mmitui/image/clienttwo.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="https://hirokei-myanmar.com/home/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientthree.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="http://aceplussolutions.com/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientfour.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="https://seasoft.asia/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientfive.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="http://seattleconsultingmyanmar.com/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientsix.jpg') }}">
                    </a>    
                </div>
                
                <div class="slide">
                    <a href="http://frobom.com/" target="_blank">
                        <img src="{{ asset('mmitui/image/clientseven.png') }}">
                    </a>
                </div>
                
                <div class="slide">
                    <a href="https://www.cloudsource.co.jp/" target="_blank">
                        <img src="{{ asset('mmitui/image/clienteight.png') }}">
                    </a>
                </div>
            </section>
        </div>
        <!-- Client -->

        <!-- Feedback - RANDOM -->
        <div class="container-fluid">
            <div class="row bg-light p-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-5">
                          <h2 class="text-center">  What Are The Student Says </h2>
                        </div>

                        <div class="col-12">
                            <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:300px;">
                                <div class="carousel-inner" role="listbox">
                                  <div class="carousel-item active text-center p-4">
                                    <blockquote class="blockquote text-center">
                                      <p class="mb-0 mmfont feedback_text"><i class="fa fa-quote-left"></i> Professional Full-stack Developer တယောက်အနေနဲ့ ရပ်တည်သွားချင်လို့ လာတတ်ဖြစ်တာပါ။ အစပိုင်းမှာ stress များခဲ့တယ်။ နောက်ပိုင်းရောက်တော့ ပိုပြီးလို့တောင် stress များတယ်။ နောက်ဆုံးမှာတော့ stress အားလုံးကို ကျော်လွှားနိုင်ခဲ့တယ်။ Thinking skills, problem solving skills တွေက member အချင်းချင်း အငြင်းပွားမှူတွေကနေတဆင့် တိုးတက်လာပါတယ်။ Mentor တွေကဆိုရင်တော့ ဆရာသက်ပေါ့ မေးခွန်း တခုမေးရင် အလွယ်တကူပြန်မဖြေတတ်ဘူး "try ကြည့်လေ ၊ try ပေါ့ " ဆိုတဲ့စကားလုံးကိုကြားရတာပေါ့။ နောက်ပိုင်းမှာ သိလိုက်ရတာက ကိုယ့်ကို တကယ်နားလည်ပြီး ရစေချင်လို့ဆိုတာပဲ။ တီချယ် ယသော်အပြုံးလေးကိုကြွေပါတယ်လို့။ ဆရာဟိန်းကို ကျေးဇူးတင်ပါတယ်။ error တခုတက်တိုင်း အမြဲအပူကပ်မေးတာတွေကို စိတ်ရှည်ရှည် နဲ့ ဖြေရှင်းပေးတယ်ပြီးတော့ "စိတ်အေးအေးထား"တဲ့။ "Food Party, Presentation time တွေကတော့ အရမ်းကြိုက်တဲ့ အစီအစဉ်လေးတွေပေါ့။ အရာရာ support ဖြစ်တဲ့အတွက် ကျေးဇူးတင်ပါတယ်။
                                      </p>
                                      <footer class="blockquote-footer mt-3"> Chan Ei Hmwe <br> <cite title="Source Title"> PHP Bootcamp Batch 3 </cite></footer>
                                      <!-- Client review stars -->
                                      <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                                      <p class="client-review-stars">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                        <i class="far fa-star"></i>
                                      </p>
                                    </blockquote>
                                  </div>
                                  <div class="carousel-item text-center p-4">
                                    <blockquote class="blockquote text-center">
                                      <p class="mb-0 mmfont feedback_text"><i class="fa fa-quote-left"></i> I joined bootcamp for programming langauge that are attractive to me. Projector is not sharpness for me. Laravel and PHP skills are quite improved. All of the mentors are be patient. Pizza Time 😍😍 I hard try best to become web developer. Conclusions, Thank you so much to all.
                                      </p>
                                      <footer class="blockquote-footer mt-3"> Pwint Wit Yee Oo <cite title="Source Title"> PHP Bootcamp Batch - 3</cite></footer>
                                      <!-- Client review stars -->
                                      <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                                      <p class="client-review-stars">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                      </p>
                                    </blockquote>
                                  </div>
                                  <div class="carousel-item text-center p-4">
                                    <blockquote class="blockquote text-center">
                                      <p class="mb-0 mmfont feedback_text"><i class="fa fa-quote-left"></i> Web Technology အကြောင်းအသေးစိတ်သိချင်လို့ လာတတ်ဖြစ်တာပါ။ ၁လအတွင်း အခက်အခဲရယ်ဆိုတာ မရှိပါဘူးဗျ။ Improving skills တွေကတော့ Ajax, Vuejs, Localstorage အသုံးပြုပုံတွေ Laravel ကို ပိုသုံးတတ်လာတယ်။ သဘောကောင်းတဲ့ ကိုကို မမ တွေနဲ့ စာသင်ခဲ့ပါတယ်။ Bootcamp မှာ အကြိုက်ဆုံး ကတော့ project များများ လုပ်ဖြစ်တယ်။ တခြားသင်တန်းတွေ နဲ့ လုံးဝမတူတာ ထူးခြားတာ အကြိုက်ဆုံးပါဗျ။ Bootcamp လည်းဒီထက်မက အောင်မြင်ပါစေ။ MIT က ဆရာတွေ အမတွေ ကျန်းမာပျော်ရွှင်ပါစေ။
                                      </p>
                                      <footer class="blockquote-footer mt-3">Kyaw Naing Thu <br> <cite title="Source Title"> PHP Bootcamp Batch 3 </cite></footer>
                                      <!-- Client review stars -->
                                      <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
                                      <p class="client-review-stars">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                      </p>
                                    </blockquote>
                                  </div>
                                </div>
                                <ol class="carousel-indicators">
                                  <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
                                  <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
                                </ol>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feedback - RANDOM  -->


    </div>
    <!-- /.Page Content -->

    

    
    <!-- Footer -->
    <footer class="py-5 primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy;  MMIT. All Rights Reserved </p>
            <p class="m-0 text-center text-white"> Designed by MMIT Developer Team </p>
        </div>
    </footer>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('mmitui/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('mmitui/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('mmitui/vendor/photogrid/images-grid.js') }}"></script>
    <script src="{{ asset('mmitui/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('mmitui/vendor/slick.js') }}"></script>
    <script src="{{ asset('mmitui/vendor/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('mmitui/vendor/custom.js') }}"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('mmitui/vendor/chart.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{asset('sb_admin2/vendor/select2/dist/js/select2.min.js')}}"></script>
    
    <!-- Plyr -->
    
  @yield('script')
</body>

</html>
