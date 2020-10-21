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
  right: 100px;
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
                    foreach($post[0]->batches as $bs){

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


                    }
                   ?>

                   
                    
                   
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
                        <li class="list-group-item topic0 active">
                            <a href="javascript:void(0)" class="text-white topics" data-bid="{{$batch->id}}" data-id=0> All Topics </a>
                        </li>
                        <?php 
                         ?>
@foreach($topics as $topic)
@if(in_array($topic->id,$b))
 <li class="list-group-item topic{{$topic->id}}">
    <a href="javascript:void(0)" class="primarytext topics" data-id="{{$topic->id}}" data-bid="{{$batch->id}}"> {{$topic->name}}</a>
</li>

   

@else
@if($topic->name == 'Project Title')
    
        @if(count($prj) > 0)

            
            <li class="list-group-item ptopic1">
                <a href="javascript:void(0)" class="primarytext ptopics" data-id="{{$ptypes}}" data-bid="{{$batch->id}}"> {{$topic->name}}</a>
            </li>
           

        @else
            <li class="list-group-item topic" style="background-color: #faf7f5;">
                <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
            </li>
        @endif

        @elseif($topic->name == 'Survey')
        @if(count($fee)==0)
            @if(date('Y-m-d') == $enddate)
            <li class="list-group-item stopic1">
                <a href="javascript:void(0)" class="primarytext stopics" data-bid="{{$batch->id}}"> {{$topic->name}}</a>
            </li>
        
            @else
            <li class="list-group-item topic" style="background-color: #faf7f5;">
                <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
            </li>
            @endif
         @else
            <li class="list-group-item topic" style="background-color: #faf7f5;">
                <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
            </li>
            @endif
        @elseif($topic->name == 'Quiz')
        {{-- count --}}
            @php
                $current_date = date('Y-m-d')
            @endphp
            @if($batch->enddate > $current_date)
                @if(count($batch->quizzes)>0)
                    <li class="list-group-item batch_quiz">
                        <a href="javascript:void(0)" class="primarytext quizz" data-bid="{{$batch->id}}"> {{$topic->name}}</a>
                    </li>
                
                    @else
                    <li class="list-group-item topic" style="background-color: #faf7f5;">
                        <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
                    </li>
                @endif
            @else
            <li class="list-group-item topic" style="background-color: #faf7f5;">
                <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
            </li>
            @endif



        @else
        <li class="list-group-item topic" style="background-color: #faf7f5">
            <a href="javascript:void(0)" class="text-secondary disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
        </li>
        @endif
        @endif
        @endforeach

                        

                        
                        
                        
                    </ul>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row" id="alltopics">
                        @foreach($post as $po)
                        @if($po->topic->name == 'Live Recording')
                        <div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                            <div class="row">
                                <div class="col-1"> 
                                    @if($po->user->getRoleNames()[0] =='Admin')
                                        <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                                    @else
                                        <img src="{{asset($po->user->staff->photo)}}" class="userprofile mr-2 d-inline">
                                    @endif
                                </div>  
                                <div class="col-11">
                                    <p class="username d-block mb-0"> {{$po->user->name}} </p>

                                    <small class="text-muted mr-3">
                                        <i class="fas fa-video mr-1"></i> {{$po->topic->name}}
                                    </small> •
                                    <small class="text-muted">
                                        <i class="far fa-clock ml-3"></i>{{$po->created_at->diffForHumans()}} 
                                    </small>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">

                                    <div class="row no-gutters bg-light position-relative">
                                        <div class="col-md-2 mb-md-0 p-md-4">
                                            <img src="{{asset($po->file)}}" class="img-fluid" alt="..." onclick="showImage(this,'<?php echo $po->file ?>')">
                                        </div>
                                      
                                        <div class="col-md-10 position-static p-4 pl-md-0">
                                        
                                         
                                            <h5 class="mt-0"> {{$po->title}} ( {{ $po->created_at->format('j.m.Y') }}  ) </h5>
                                            <!-- Blog Body -->
                                            <!-- <p> Vue Cli repo </p> -->
                                            @php $b = strip_tags($po->content); @endphp
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
                                    @if($po->user->getRoleNames()[0] =='Admin')
                                    <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                                    @else
                                    <img src="{{asset($po->user->staff->photo)}}" class="userprofile mr-2 d-inline">
                                    @endif  
                                    
                                </div>
                                <div class="col-11">
                                    <p class="username d-block mb-0"> {{$po->user->name}} </p>

                                    <small class="text-muted mr-3">
                                        @if($po->topic->name == 'Announcement')
                                        <i class="fas fa-bullhorn mr-1"></i>
                                        @elseif($po->topic->name == 'Schedule')
                                        <i class="icofont-calendar"></i>  
                                        @elseif($po->topic->name == 'Assignment')
                                        <i class="far fa-check-square mr-1"></i>
                                        @elseif($po->topic->name == 'Live Recording') 
                                        <i class="fas fa-video mr-1"></i> 
                                        @elseif($po->topic->name == 'Assignment') 
                                        <i class="far fa-check-square mr-1"></i>
                                        @elseif($po->topic->name == 'Post') 
                                        <i class="fas fa-envelope mr-1"></i> 
                                        @else
                                          <i class="icofont-question-circle"></i>
                                        @endif
                                        {{$po->topic->name}}
                                    </small> •
                                    <small class="text-muted">
                                        <i class="far fa-clock ml-3"></i> {{$po->created_at->diffForHumans()}} 
                                    </small>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <blockquote class="blockquote  text-primary">
                                        <h5 class="mb-0"> {{$po->title}} </h5>
                                        
                                        <p>{!! $po->content !!}</p>
                                    </blockquote>

                                    <div class="row">
                                        @php
                                        $images = explode(',',$po->file);
                                        $filetype = pathinfo($po->file, PATHINFO_EXTENSION);
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
                                               
                                            <source src="{{ asset($po->file) }}" type="video/mp4" />

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
                        @endforeach
                    </div>
                    <div class="row" id="proj">
                        <div class="col-12">
                        <div id="accordion" class="accordion pp" >
                          
                        </div>
                    </div>
                    </div>
                    <!-- <div class="row" id="proj">
                       
                        <div class="col-12 shadow p-3 mb-5 bg-white rounded mb-class" style="height: 300px;">
                            <form action="{{route('projecttitle')}}" method="POST">
                                @csrf
                            <input type="hidden" name="projtypeid" id="projtypeid">
                            <div class="row">
                                <div class="col-6 mt-5">
                                   <label for="ptitle">Project Title</label>
                                    <input type="text" name="ptitle" class="form-control" id="ptitle">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="inputStudent">Select Student:</label>
                                    <select name="student[]" class="js-example-basic-multiple form-control" id="inputStudent" multiple="multiple">

                                        @foreach($batchstudents as $bstudent)
                                        <option value="{{$bstudent->id}}">{{$bstudent->namee}}</option>
                                        @endforeach      
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                               <div class="col-12 mt-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                               </div>
                            </div>
                            </form>
                        </div>
                        
                    </div> -->
                    <div class="signup-step-container">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div class="wizard">
                                        <div class="wizard-inner">
                                            <div class="connecting-line"></div>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="step1">
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
                        
                                        <form role="form" action="{{route('feedback')}}" method="POST" class="login-box mmfont">
                                            @csrf
                                        <input type="hidden" name="batchid" id="signhidden">
                                        <div class="tab-content" id="main_form">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                <h4 class="text-center">Step 1</h4>
                                                <div class="row justify-content-center">
                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label> သင်ကြားမှု ကာလအတွင်း ဘာအခက်အခဲတွေရှိခဲ့လဲ </label> 
                                                            <input class="form-control" type="text" name="trouble" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label> သင်တန်း ကနေ ကိုယ့်ကိုယ်ကို ဘာတွေအကျိုးရှိသွားတယ် ထင်မိလဲ  </label> 
                                                            <input class="form-control" type="text" name="benefit" placeholder=""> 
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
                                                            <input class="form-control" type="text" name="teaching" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label> Mentor တွေနဲ့ အဆင်ပြေရဲ့လား။ အပြည့်အစုံပြောပြပေးပါ။ </label> 
                                                            <input class="form-control" type="text" name="mentoring" placeholder=""> 
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label>  သင်တန်း မှာအကြိုက်ဆုံးကဏ္ဍက ဘာဖြစ်မလဲ။ </label> 
                                                            <input class="form-control" type="text" name="favourite" placeholder=""> 
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
                                                          <input type="radio" name="speed"
                                                          value="Slow" class="card-input-element" />

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
                                                            <input type="radio" name="speed" value="Normal" class="card-input-element" />

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
                                                            <input type="radio" name="speed" value="Fast" class="card-input-element" />

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
                                                            <input type="radio" name="speed" value="Super Rocket" class="card-input-element" />

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
                                                            <input class="form-control" type="text" name="maintain" placeholder=""> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label> မိမိရဲ့ လက်ဆွဲဆောင်ပုဒ် </label> 
                                                            <input class="form-control" type="text" name="quote" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 my-2">
                                                        <div class="form-group">
                                                            <label> အပိတ်အနေနဲ့ ကိုယ့်သူငယ်ချင်းတွေကို လာတတ်ဖို့ ဘယ်လို recommend ပေးချင်သလဲ </label> 
                                                            <input class="form-control" type="text" name="recommend" placeholder=""> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 my-2">
                                                        <label>Rating</label>
                                                        <!-- <span class="my-rating-9"></span>
                                                        <input class="live-rating" name="live-rating" type="hidden"> -->
                                                        <div id="rateYo"></div>
                                                        <input type="hidden" name="live-rating" class="live-rating">
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
                    </div>


                    {{-- quiz --}}
                    <div class="answer_quiz">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row">
                                <!-- Record -->
                                @foreach($batch->quizzes as $quiz)
                                <div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                                    <div class="row">
                                        <div class="col-1">
                                            @if($quiz->user->staff)
                                            <img src="{{asset($quiz->user->staff->photo)}}" class="userprofile mr-2 d-inline">
                                            @else
                                            <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                                            @endif
                                            
                                        </div>
                                        <div class="col-11">
                                            <p class="username d-block mb-0"> {{$quiz->user->name}} </p>

                                            <small class="text-muted mr-3">
                                                <i class="icofont-question-circle"></i> 
                                                {{$quiz->subject->name}}
                                            </small> •
                                            <small class="text-muted">
                                                <i class="far fa-clock ml-3"></i> 
                                                @php
                                                    
                                                @endphp
                                                {{$quiz->pivot->created_at->diffForHumans()}}
                                            </small>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12">

                                            <div class="row no-gutters bg-light position-relative">
                                                
                                                <div class="col-md-12 p-4">
                                                    <!-- Blog Title -->
                                                    <h5 class="mt-0">
                                                        {{$quiz->title}} 
                                                    </h5>
                                                    <!-- Blog Body -->
                                                     @php
                                                        $strtotime = strtotime($quiz->created_at);
                                                        
                                                        $date = date('d-m-Y',$strtotime);
                                                    @endphp
                                                    <p> ( {{$date}} ) </p>
                                                    @php
                                                        $array = array();
                                                        $score = 0;
                                                        $stu_array = array();
                                                    @endphp
                                                    @if($quiz->response || Auth::user()->student->response)

                                                    @foreach($quiz->response as $response)
                                                    @if($response->student_id == Auth::user()->student->id && $response->status == 'Active')
                                                        @php
                                                            array_push($array, Auth::user()->student->id);
                                                            $score+=$response->score;
                                                        @endphp

                                                    @endif

                                                    @endforeach

                                                    @foreach(Auth::user()->student->batches as $batch)
                                                        @if($batch->pivot->status == 'Active')
                                                            @php
                                                                array_push($stu_array, Auth::user()->student->id);
                                                                // dd($batch->pivot->status);
                                                            @endphp
                                                        @endif

                                                    @endforeach

                                                    @if($array != null && $stu_array != null)
                                                    <a href="{{route('frontend.quizanswer',$quiz->id)}}?channel={{$channel}}" class="btn btn-outline-primary btn-sm"> View Score </a>
                                                    <button class=" btn-sm btn btn-outline-success" disabled="">
                                                    Total Score ( {{$score}} )
                                                    </button>
                                                    @else
                                                        <a href="{{route('takequizz',$quiz->id)}}" class="btn btn-outline-primary btn-sm start_question" > Start Quizz </a>
                                                    
                                                    @endif

                                                    @else
                                                        <a href="{{route('takequizz',$quiz->id)}}" class="btn btn-outline-primary btn-sm start_question" > Start Quizz </a>
                                                    @endif
                                                    
                                              </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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


<script src="{{asset('js/star.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/rating.css')}}">

    <script type="text/javascript">
        $(document).ready(function(){
           
                   
                                                
            $(".js-example-basic-multiple").select2({
              placeholder: "Choose At Least Two",
              theme: 'bootstrap4',
            });

            $('#proj').hide();
        var DURATION_IN_SECONDS = {
          epochs: ['year', 'month', 'day', 'hour', 'minute'],
          year: 31536000,
          month: 2592000,
          day: 86400,
          hour: 3600,
          minute: 60
        };

        function getDuration(seconds) {
          var epoch, interval;

          for (var i = 0; i < DURATION_IN_SECONDS.epochs.length; i++) {
            epoch = DURATION_IN_SECONDS.epochs[i];
            interval = Math.floor(seconds / DURATION_IN_SECONDS[epoch]);
            if (interval >= 1) {
              return {
                interval: interval,
                epoch: epoch
              };
            }
          }

        };

        function timeSince(date) {
          var seconds = Math.floor((new Date() - new Date(date)) / 1000);
          var duration = getDuration(seconds);
          var suffix = (duration.interval > 1 || duration.interval === 0) ? 's' : '';
          return duration.interval + ' ' + duration.epoch + suffix;
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var html1=''; var html2=''; var html3=''; 
        var html4=''; var html7=''; var html6='';
        var html8='';

        html1 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-class">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="fas fa-bullhorn mr-1"></i> Announcement
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <p class="mb-0"> Final  Presentation </p>
                            </blockquote>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/an1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/an2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;

        html1 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="fas fa-bullhorn mr-1"></i> Announcement
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <p class="mb-0"> Tips  of Portfolio </p>
                            </blockquote>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/tip1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/tip2.jpg" alt="" class="img-fluid">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/tip3.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/tip4.jpg" alt="" class="img-fluid">
                                </div>

                            </div>

                            
                        </div>
                    </div>
                    
                </div>`;

        html2 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-class">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="far fa-check-square mr-1"></i> Assignment
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <p class="mb-0"> PHP Assignment </p>
                            </blockquote>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/g5_1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/g5_2.jpg" alt="" class="img-fluid">
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/g5_3.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/g5_4.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/g5_5.jpg" alt="" class="img-fluid">
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;

        html7 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-class">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="icofont-calendar"></i> Schedule
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <p class="mb-0"> Time Table </p>
                            </blockquote>

                            <div class="row">

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/s1.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/s2.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <img src="mmitui/image/test/s3.jpg" alt="" class="img-fluid">
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;


        html3 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="fas fa-video mr-1"></i> Live Recording 
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">

                            <div class="row no-gutters bg-light position-relative">
                                <div class="col-md-2 mb-md-0 p-md-4">
                                    <img src="mmitui/image/vue.png" class="img-fluid" alt="...">
                                </div>
                              
                                <div class="col-md-10 position-static p-4 pl-md-0">
                                    <!-- Blog Title -->
                                    <h5 class="mt-0"> Vue Record ( 24.10.2020 ) </h5>
                                    <!-- Blog Body -->
                                    <p> Vue Cli repo </p>
                                    
                                    <a href="#" class="stretched-link"> Download </a>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;


        html2+= `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="far fa-check-square mr-1"></i> Assignment
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <p class="mb-0"> CodeIgniter </p>
                            </blockquote>

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <img src="mmitui/image/p1.jpg" alt="" class="img-fluid">
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;


        html4 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Hein Min Htet </p>

                            <small class="text-muted mr-3">
                                <i class="fas fa-envelope mr-1"></i>Post
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote">
                                <p class="mb-3 mmfont text-primary">
                                    Laravel Upload တင်နည်းပါ (Without git)
                                </p>
                                <p class="mmfont text-muted"> 

                                    Laravel Upload တင်တဲ့အခါ အရေးကြီးတဲ့နှစ်ချက်ရှိတယ်။ <br>
                                    ၁။ Laravel Version မြင့်ပေးတာရယ်။ <br>
                                    ၂။ .htaccess ထည့်ပေးတာရယ်။
                                    ကျန်တာတွေက အရင် Pure တင်တဲ့အတိုင်းပါပဲနော်။
                                    အသေးစိတ်ကို အောက်က Video မှာလုပ်ပြပေးထားပါတယ်။
                                    Error များရှိခဲ့ပါက စုံစမ်းမေးမြန်းနိုင်ပါသည်။
                                </p>
                            </blockquote>

                            <div class="embed-responsive embed-responsive-16by9">
                                
                                <video controls>
                                    <source src="mmitui/about.mp4" type="video/mp4">
                                </video>
                            </div>

                        </div>
                    </div>
                    
                </div>`;

        var quizanswerURL = "";
        var quizURL = "";


        html6 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="icofont-question-circle"></i> Quizz
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">

                            <div class="row no-gutters bg-light position-relative">
                                
                                <div class="col-md-12 p-4">
                                    <!-- Blog Title -->
                                    <h5 class="mt-0"> PHP Quizzes  </h5>
                                    <!-- Blog Body -->
                                    <p> ( 24.10.2020 ) </p>
                                    
                                    <a href="${quizURL}" class="btn btn-outline-primary btn-sm"> Start Quizz </a>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                </div>`;


        html6 += `<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">
                        <div class="col-1">
                            <img src="mmitui/image/user.png" class="userprofile mr-2 d-inline">
                            
                        </div>
                        <div class="col-11">
                            <p class="username d-block mb-0"> Thet Paing Htut </p>

                            <small class="text-muted mr-3">
                                <i class="icofont-question-circle"></i> Quizz
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 25 minutes ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">

                            <div class="row no-gutters bg-light position-relative">
                                
                                <div class="col-md-12 p-4">
                                    <!-- Blog Title -->
                                    <h5 class="mt-0"> Frontend Development Quizzes  </h5>
                                    <!-- Blog Body -->
                                    <p> ( 24.10.2020 ) </p>
                                    
                                    <a href="${quizanswerURL}" class="btn btn-outline-primary btn-sm"> View Score </a>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                </div>`;

        

        /*$('#alltopics').html(html3+html7+html1+html2+html4);*/
        $('.signup-step-container').hide();
        $('.answer_quiz').hide();

        $('.topics').on('click',function(){
            var id = $(this).data('id');
            var bid = $(this).data('bid');
            
            var html='';

            $.post('/allchannel',{id:id,bid:bid},function(response){
                //console.log(response.posts);
                $.each(response.posts,function(i,v){
                    console.log(v);
                    var date = new Date(v.created_at);
                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                    var images = v.file.split(',');
                    var filetype = v.file.split('.').pop();
                    if(v.topic.name == 'Live Recording'){
                        html+=`<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">`;
                       if(v.user.staff==null){
                        html+= `<div class="col-1">
                            <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                            
                        </div>`;
                    }else{
                        html+= `<div class="col-1">
                            <img src="${v.user.staff.photo}" class="userprofile mr-2 d-inline">
                            
                        </div>`;
                    }
                        html+=`<div class="col-11">
                            <p class="username d-block mb-0">${v.user.name}</p>

                            <small class="text-muted mr-3">
                                <i class="fas fa-video mr-1"></i> ${v.topic.name} 
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> ${timeSince(v.created_at)} ago 
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">

                            <div class="row no-gutters bg-light position-relative">
                                <div class="col-md-2 mb-md-0 p-md-4">
                                    <img src="${v.file}" class="img-fluid" alt="...">
                                </div>
                              
                                <div class="col-md-10 position-static p-4 pl-md-0">`;
                                
                                    
                                    html+=`<!-- Blog Title --><h5 class="mt-0"> ${v.title} ( ${day}.${month}.${year} ) </h5>`;
                                  var con = v.content.replace(/<\/?[^>]+(>|$)/g, "");
                                    
                                    html+=`<a href="${con}" class="stretched-link" target="_blank"> Download </a>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>`;
                    }else{
                    html+=`<div class="col-12 shadow p-3 mb-5 bg-white rounded mb-4">
                    <div class="row">`;
                    if(v.user.staff==null){
                        html+= `<div class="col-1">
                            <img src="{{asset('mmitui/image/user.png')}}" class="userprofile mr-2 d-inline">
                            
                        </div>`;
                    }else{
                        html+= `<div class="col-1">
                            <img src="${v.user.staff.photo}" class="userprofile mr-2 d-inline">
                            
                        </div>`;
                    }
                        html+=`<div class="col-11">
                            <p class="username d-block mb-0"> ${v.user.name}</p>

                            
                            <small class="text-muted mr-3">`;
                                if(v.topic.name == 'Announcement'){
                                html+=`<i class="fas fa-bullhorn mr-1"></i>`;
                                }
                                else if(v.topic.name == 'Schedule'){
                                html+=`<i class="icofont-calendar"></i>`; } 
                                else if(v.topic.name == 'Assignment'){
                                html+=`<i class="far fa-check-square mr-1"></i>`;}
                                else if(v.topic.name == 'Live Recording') {
                                html+=`<i class="fas fa-video mr-1"></i>`;}
                                else if(v.topic.name == 'Assignment'){ 
                                html+=`<i class="far fa-check-square mr-1"></i>`;}
                                else if(v.topic.name == 'Post'){
                                html+=`<i class="fas fa-envelope mr-1"></i>`;
                                }
                                else{
                                  html+=`<i class="icofont-question-circle"></i>`;
                                }
                                
                                html+=`${v.topic.name}
                            </small> •
                            <small class="text-muted">
                                <i class="far fa-clock ml-3"></i> 
                                ${timeSince(v.created_at)} ago
                            </small>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <blockquote class="blockquote  text-primary">
                                <h5 class="mb-2"> ${v.title} </h5>
                                <!--<p class="">${v.content.replace(/<\/?[^>]+(>|$)/g, "")}</p>-->
                                <div class="pcontent">${v.content}</p>
                            </blockquote>

                            <div class="row">`;
                            if(filetype == 'JPG' || filetype == 'jpg' || filetype == 'JPEG' || filetype == 'jpeg' || filetype == 'bmp' || filetype == 'png'){
                            $.each(images,function(k,c){
                                html+=`<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="${c}" alt="" class="img-fluid"  onclick="showImage(this,'${c}')">
                                </div>`;
                            });
                             }
                             else if(filetype == "x-flv" || filetype == "mp4" || filetype == "x-mpegURL" || filetype == "MP2T" || filetype == "3gpp" || filetype == "quicktime" || filetype == "x-msvideo" || filetype == "x-ms-wmv" || filetype == "mov" || filetype == 'ogg' || filetype == 'mkv'){
                  html+=`<div class="col-lg-6 col-md-6 col-sm-12 col-12"><video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline >
                       
                    <source src="${v.file}" type="video/mp4" />

                </video></div>`;
                }else{

                }

                            html+=`</div>
                            
                        </div>
                    </div>
                </div>`;
                }
               
                });
                 $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');
                
                $('#alltopics').show();
                $('#alltopics').html(html);
                $('.signup-step-container').hide();
                $('#proj').hide();
            });
            /*if (id == 1) {

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');
                
                $('#alltopics').show();
                $('#alltopics').html(html3+html7+html1+html2+html4);
                $('.signup-step-container').hide();
                
            }

            else if (id == 2) {

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');
                
                $('#alltopics').show();
                $('#alltopics').html(html1);
                $('.signup-step-container').hide();

            }

            else if (id == 3){

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').show();
                $('#alltopics').html(html2);
                $('.signup-step-container').hide();

            }
            else if (id == 4){

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').show();
                $('#alltopics').html(html3);
                $('.signup-step-container').hide();

            }
            else if (id == 5){

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').show();
                $('#alltopics').html(html4);
                $('.signup-step-container').hide();


            }

            else if (id == 6){

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');
                
                $('#alltopics').show();
                $('#alltopics').html(html7);
                $('.signup-step-container').hide();

            }

            else if (id == 7){

                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').show();
                $('#alltopics').html(html6);
                $('.signup-step-container').hide();

            }

            else if (id == 8){
                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.list-group li.active').removeClass('active');

                $('.topic'+id).addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').hide();
                $('.signup-step-container').show();


            }*/

        });
            
        $('.ptopics').on('click',function(){
            var id = $(this).data('id');
            var bid = $(this).data('bid');
            var html = ''; var j=1;
            $.post('/frontendproject',{id:id,bid:bid},function(response){
                $.each(response.project,function(i,v){
                    console.log(v.id);
                    html+=`     
                    <div class="card-header collapsed" data-toggle="collapse" data-poid="${v.id}" data-baid="${response.batch.id}" data-parent="#accordion" href="#collapse${v.id}">
                                <a class="card-title">
                                    <i class="fab fa-bandcamp ml-3 icon"></i>
                                    ${response.batch.title} | 
                                    <i class="fab fa-r-project ml-3 icon"></i>
                                    
                                    ${v.name}

                                </a>
                            </div>
                            <div id="collapse${v.id}" class="card-body collapse" data-parent="#accordion">
                                <div class="row" id='tbody${v.id}'>

                                </div>
                              
                               

                            </div>
               `;
                })
                $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.active').removeClass('active');

                $('.ptopic1').addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').hide();
                $('.signup-step-container').hide();
                $('#proj').show();
                $('.pp').html(html);
                $('#projtypeid').val(id);
            })
            
        })

        $('.pp').on('click','.collapsed',function(){
         
                    var poid = $(this).data('poid');

                    var baid = $(this).data('baid');
                    $.post('/prj',{poid:poid,baid:baid},function(response){
                      
                        if(response.projs.length > 0){
                        var html = ''; var j = 1;
                        var js = [];
                        $.each(response.projs,function(i,v){
                            console.log(v);
                            html+=`<div class="col-md-6 col-12">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Project Title: ${v.title}</h5>
                                    <h6 class="card-subtitle mb-2">Student Name</h6>
                                    <p class="card-text">`;
                                    var output= [];
                            for(var i=0; i<v.students.length; i++){
                                output.push(v.students[i].namee);
                            }

                            html+=`${output.join(' , ')}`;
                            if(v.link != null){
                                    html+=`</p>
                                    <a href="${v.link}" class="card-link" target="_blank"> Link</a>`;
                                    }else{
                                        html+=`</p><a href="#" class="card-link">Link</a>`;
                                    }
                                  html+=`</div>
                                </div></div>`;
                           
                             
                        })
                        $('#tbody'+poid).html(html);
                        $('#collapse'+poid).collapse('show');
                           
                        }else{
                            $('#collapse'+poid).collapse('hide');
                        }
                    })
                });

        $('.stopics').on('click',function(){

            var baid = $(this).data('bid');
            //alert(baid);
             $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.active').removeClass('active');
                $('.step1').addClass('active');
                $('#step1').addClass('active');
                $('.stopic1').addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').hide();
               
                $('#proj').hide();
               
               
            $('.signup-step-container').show();
            $('#signhidden').val(baid);
        })


        $('.quizz').on('click',function(){

            var baid = $(this).data('bid');
            //alert(baid);
             $('.list-group li.active a').removeClass('text-white');
                $('.list-group li.active a').addClass('primarytext');
                $('.active').removeClass('active');
                $('.step1').addClass('active');
                $('#step1').addClass('active');
                $('.batch_quiz').addClass('active');
                $('.list-group li.active a').addClass('text-white');
                $('.list-group li.active a').removeClass('primarytext');

                $('#alltopics').hide();
               
                $('#proj').hide();
               
               
            $('.answer_quiz').show();
            $('#signhidden').val(baid);
        })
        /*$(".my-rating-9").starRating({
            initialRating: 0,
            disableAfterRate: false,
            onHover: function(currentIndex, currentRating, $el){
              $('.live-rating').val(currentIndex);
            },
            onLeave: function(currentIndex, currentRating, $el){
              $('.live-rating').val(currentRating);
            }
        });*/

        $(function () {
 
            $("#rateYo").rateYo()
              .on("rateyo.set", function (e, data) {
                $('.live-rating').val(data.rating);
                 // alert("The rating is set to " + data.rating + "!");
            });
        });


    });
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
