@extends('template')
@section('content')
<style type="text/css">
.modal {
    display: none; 
    position: fixed; 
    z-index: 4;
    padding-top: 100px;
    margin-top: 50px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto;
    vertical-align: middle;
}
.modal-content{
    width: 80%;
    max-width: 700px; 
    height:500; 
    margin: auto;
    display: block;
}

.close {
  position: absolute;
  top: 70px;
  right: 400px;
  /*color: #f1f1f1;*/
  color: black;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
</style>
    <!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    
                    
                    <?php
                    
                    foreach($postid->batches as $bs){
                       
                    $words[] = explode(" ", $bs->title);
                
                    
                    }
                    foreach($words as $w){
                        $c = explode(" ",$batch->title);
                       
                        if($w[0] == $c[0]){?>
                            <h1 class="display-4 mt-5 mb-2">{{$c[0]}} Developer Bootcamp Channel, </h1>
                            <p> {{$w[1]}} - {{$w[2]}} </p>

                        <?php
                            break;

                        }else{
                            continue;
                        }


                    }?>
                   
                    
                   
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->
    
    <!-- Page Content -->
    <div id="page-content">
        <div class="container my-5">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <ul class="list-group ">
                        <li class="list-group-item topic"  style="background-color: #faf7f5">
                            <a href="javascript:void(0)" class="primarytext disabled"> All Topics<i class="fas fa-lock text-secondary float-right"></i> </a>
                        </li>
                    
                        @foreach($topics as $topic)
                        @if($topic->id == $topid)
                         <li class="list-group-item topic{{$topic->id}} active">
                            <a href="javascript:void(0)" class="text-white topics" data-id="{{$topic->id}}" data-bid=""> {{$topic->name}}</a>
                        </li>
                        @else
                        <li class="list-group-item topic" style="background-color: #faf7f5">
                            <a href="javascript:void(0)" class="primarytext disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
                        </li>
                        @endif
                        @endforeach
                      
                    </ul>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row" id="alltopics">
                        @if($postid->topic->name == 'Live Recording')
                        <div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                        <div class="row">
                            <div class="col-1"> 
                                @if($postid->user->getRoleNames()[0] =='Admin')
                                    <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                                @else
                                    <img src="{{asset($postid->user->staff->photo)}}" class="userprofile mr-2 d-inline">
                                @endif
                            </div>  
                            <div class="col-11">
                                <p class="username d-block mb-0"> {{$postid->user->name}} </p>

                                <small class="text-muted mr-3">
                                    <i class="fas fa-video mr-1"></i> {{$postid->topic->name}}
                                </small> •
                                <small class="text-muted">
                                    <i class="far fa-clock ml-3"></i>{{$postid->created_at->diffForHumans()}} 
                                </small>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">

                                <div class="row no-gutters bg-light position-relative">
                                    <div class="col-md-2 mb-md-0 p-md-4">
                                        <img src="{{asset($postid->file)}}" class="img-fluid" alt="..." onclick="showImage(this,'<?php echo $postid->file ?>')">
                                    </div>
                                  
                                    <div class="col-md-10 position-static p-4 pl-md-0">
                                    
                                     
                                        <h5 class="mt-0"> {{$postid->title}} ( {{ $postid->created_at->format('j.m.Y') }}  ) </h5>
                                        <!-- Blog Body -->
                                        <!-- <p> Vue Cli repo </p> -->
                                        @php $b = strip_tags($postid->content); @endphp
                                        <a href="{{$b}}" class="stretched-link" target="_blank"> Download </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    </div>
                    @else
                        <div class="col-12 shadow p-3 mb-5 bg-white rounded mb-class">
                            <div class="row">
                                <div class="col-1">
                                    @if($postid->user->getRoleNames()[0] =='Admin')
                                    <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                                    @else
                                    <img src="{{asset($postid->user->staff->photo)}}" class="userprofile mr-2 d-inline">
                                    @endif  
                                    
                                </div>
                                <div class="col-11">
                                    <p class="username d-block mb-0"> {{$postid->user->name}} </p>

                                    <small class="text-muted mr-3">
                                        @if($postid->topic->name == 'Announcement')
                                        <i class="fas fa-bullhorn mr-1"></i>
                                        @elseif($postid->topic->name == 'Schedule')
                                        <i class="icofont-calendar"></i>  
                                        @elseif($postid->topic->name == 'Assignment')
                                        <i class="far fa-check-square mr-1"></i>
                                        @elseif($postid->topic->name == 'Live Recording') 
                                        <i class="fas fa-video mr-1"></i> 
                                        @elseif($postid->topic->name == 'Assignment') 
                                        <i class="far fa-check-square mr-1"></i>
                                        @elseif($postid->topic->name == 'Post') 
                                        <i class="fas fa-envelope mr-1"></i> 
                                        @else
                                          <i class="icofont-question-circle"></i>
                                        @endif
                                        {{$postid->topic->name}}
                                    </small> •
                                    <small class="text-muted">
                                        <i class="far fa-clock ml-3"></i> {{$postid->created_at->diffForHumans()}} 
                                    </small>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <blockquote class="blockquote  text-primary">
                                        <h5 class="mb-0"> {{$postid->title}} </h5>
                                        <p >{!!$postid->content!!}</p>
                                    </blockquote>

                                    <div class="row">
                                        @php
                                        $images = explode(',',$postid->file);
                                        $filetype = pathinfo($postid->file, PATHINFO_EXTENSION);
                                        @endphp
                                        @if($filetype == 'JPG' || $filetype == 'jpg' || $filetype == 'JPEG' || $filetype == 'jpeg' || $filetype == 'bmp' || $filetype == 'png')
                                        @foreach($images as $image)
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <img src="{{asset($image)}}" alt="" class="img-fluid" onclick="showImage(this,'<?php echo $image ?>')">
                                        </div>
                                        @endforeach
                                        @elseif($filetype == "x-flv" || $filetype == "mp4" || $filetype == "x-mpegURL" || $filetype == "MP2T" || $filetype == "3gpp" || $filetype == "quicktime" || $filetype == "x-msvideo" || $filetype == "x-ms-wmv" || $filetype == "mov" || $filetype == 'ogg' || $filetype == 'mkv')
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                          <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline >
                                               
                                            <source src="{{ asset($postid->file) }}" type="video/mp4" />

                                            </video>
                                        </div>
                                        @else
                                        @endif
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <img src="mmitui/image/test/an2.jpg" alt="" class="img-fluid">
                                        </div> -->
                                    </div>
                                    
                                </div>
                            </div>
                    
                        </div>
                    @endif
                       
                    </div>

                   
                    <!-- <div class="signup-step-container">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div class="wizard">
                                        <div class="wizard-inner">
                                            <div class="connecting-line"></div>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                                </li>
                                            </ul>
                                        </div>
                        
                                        <form role="form" action="" method="GET" class="login-box mmfont">
                                            <div class="tab-content" id="main_form">
                                                <div class="tab-pane active" role="tabpanel" id="step1">
                                                    <h4 class="text-center">Step 1</h4>
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> သင်ကြားမှု ကာလအတွင်း ဘာအခက်အခဲတွေရှိခဲ့လဲ </label> 
                                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> သင်တန်း ကနေ ကိုယ့်ကိုယ်ကို ဘာတွေအကျိုးရှိသွားတယ် ထင်မိလဲ  </label> 
                                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="default-btn next-step text-white">Continue to next step</button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step2">
                                                    <h4 class="text-center">Step 2</h4>
                                                    <div class="row">

                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> ဆရာ ဆရာမ တွေနဲ့သင်ရတာအဆင်ပြေရဲ့လား။ အပြည့်အစုံပြောပြပေးပါ။ </label> 
                                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> Mentor တွေနဲ့ အဆင်ပြေရဲ့လား။ အပြည့်အစုံပြောပြပေးပါ။ </label> 
                                                                <input class="form-control" type="email" name="name" placeholder=""> 
                                                            </div>
                                                        </div> 

                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label>  သင်တန်း မှာအကြိုက်ဆုံးကဏ္ဍက ဘာဖြစ်မလဲ။ </label> 
                                                                <input class="form-control" type="email" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                        <li><button type="button" class="default-btn next-step text-white">Continue</button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step3">
                                                    <h4 class="text-center"> Lecture Speed </h4>
                                                    <div class="row justify-content-center">

                                                        <div class="col-md-6 col-lg-3 col-sm-6 col-6">
                                                            <label>
                                                              <input type="radio" name="product" class="card-input-element" />

                                                                <div class="card card-input">
                                                                    <img src="{{ asset('mmitui/image/lecturespeed1.gif') }}" class="card-img-top speedGif" alt="...">
                                                                    <div class="card-body text-center">
                                                                        <p class="card-text"> Slow </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-3 col-sm-6 col-6">
                                                            <label>
                                                                <input type="radio" name="product" class="card-input-element" />

                                                                <div class="card card-input">
                                                                    <img src="{{ asset('mmitui/image/lecturespeed2.gif') }}" class="card-img-top speedGif" alt="...">
                                                                    <div class="card-body text-center">
                                                                        <p class="card-text"> Normal </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="col-md-6 col-lg-3 col-sm-6 col-6">
                                                            <label>
                                                                <input type="radio" name="product" class="card-input-element" />

                                                                <div class="card card-input">
                                                                    <img src="{{ asset('mmitui/image/lecturespeed3.gif') }}" class="card-img-top speedGif" alt="...">
                                                                    <div class="card-body text-center">
                                                                        <p class="card-text"> Fast </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <div class="col-md-6 col-lg-3 col-sm-6 col-6">
                                                            <label>
                                                                <input type="radio" name="product" class="card-input-element" />

                                                            <div class="card card-input">
                                                                    <img src="{{ asset('mmitui/image/lecturespeed4.gif') }}" class="card-img-top speedGif" alt="...">
                                                                    <div class="card-body text-center">
                                                                        <p class="card-text"> Super Rocket </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                        <li><button type="button" class="default-btn next-step text-white">Continue</button></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" role="tabpanel" id="step4">
                                                    <h4 class="text-center">Step 4</h4>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> မိမိအနေဖြင့် သင်တန်းကာလအတွင်းမှာ ဘယ် ကဏ္ဍလေးတွေကို ပြုပြင် စေချင်သလဲ </label> 
                                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> မိမိရဲ့ လက်ဆွဲဆောင်ပုဒ် </label> 
                                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 my-2">
                                                            <div class="form-group">
                                                                <label> အပိတ်အနေနဲ့ ကိုယ့်သူငယ်ချင်းတွေကို လာတတ်ဖို့ ဘယ်လို recommend ပေးချင်သလဲ </label> 
                                                                <input class="form-control" type="email" name="name" placeholder=""> 
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                                        <li><button type="submit" class="default-btn next-step text-white">Finish</button></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Page Content -->
<div id="myModal" class="modal">
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <img class="modal-content" id="img">
        <div id="caption"></div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
   
       
        function showImage(element,i){

            // Get the modal
            var modal = document.getElementById('myModal');
        
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById('myImg'+i);
            var modalImg = document.getElementById("img");
            var captionText = document.getElementById("caption");
                modal.style.display = "block";
                modalImg.src = element.src;
                captionText.innerHTML = element.alt;
           }
     

</script>
@endsection
