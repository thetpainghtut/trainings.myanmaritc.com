@extends('template')
@section('content')

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
                        <li class="list-group-item topic0 active">
                            <a href="javascript:void(0)" class="text-white topics" data-id=0> All Topics </a>
                        </li>

                        @foreach($topics as $topic)
                        @foreach($topic->posts as $pb)
                       @foreach($pb->batches as $p)
                       @if($p->id == $batch->id)
                       <li class="list-group-item topic{{$topic->id}}">
                            <a href="javascript:void(0)" class="primarytext topics" data-id="{{$topic->id}}"> {{$topic->name}}</a>
                        </li>
                        @php break; @endphp
                        
                       @endif
                       @endforeach
                        @endforeach
                        @if($topic->posts->isEmpty())
                        @if($topic->name == 'Project Title')
                            @if($status == 1)
                            <li class="list-group-item topic" style="background-color: #faf7f5">
                                <a href="javascript:void(0)" class="primarytext disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
                            </li>
                            @else
                            @if(count($projecttypes) > 0)
                                @foreach($projecttypes as $pt)
                                <li class="list-group-item ptopic{{$pt->id}}">
                                    <a href="javascript:void(0)" class="primarytext ptopics" data-id="{{$pt->id}}"> {{$topic->name}}</a>
                                </li>
                                @endforeach
                            @else
                            <li class="list-group-item topic" style="background-color: #faf7f5">
                                <a href="javascript:void(0)" class="primarytext disabled"> {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
                            </li>
                            @endif
                            @endif
                        @else
                        <li class="list-group-item topic" style="background-color: #faf7f5">
                            <a href="javascript:void(0)" class="primarytext disabled" > {{$topic->name}}  <i class="fas fa-lock text-secondary float-right"></i></a>
                        </li>
                        @endif
                        @endif
                        
                       @endforeach
                        <!-- <li class="list-group-item topic2">
                            <a href="javascript:void(0)" class="primarytext topics"data-id=2> Assignment </a>
                        </li> -->

                        

                        
                        
                        
                    </ul>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row" id="alltopics">
                        @foreach($post as $po)
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
                                        <p class="mb-0"> {{$po->title}} </p>
                                    </blockquote>

                                    <div class="row">
                                        @php
                                        $images = explode(',',$po->file);
                                        @endphp
                                        @foreach($images as $image)
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <img src="{{asset($image)}}" alt="" class="img-fluid">
                                        </div>
                                        @endforeach
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <img src="mmitui/image/test/an2.jpg" alt="" class="img-fluid">
                                        </div> -->
                                    </div>
                                    
                                </div>
                            </div>
                    
                        </div>
                        @endforeach
                    </div>

                    <div class="row" id="proj">
                       
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
                        
                    </div>
                    <div class="signup-step-container">
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
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Page Content -->

@endsection

@section('script')
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

        var quizanswerURL = "{{ route('frontend.quizanswer') }}";
        var quizURL = "{{ route('frontend.takequiz') }}";


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

        $('.topics').on('click',function(){
            var id = $(this).data('id');
            console.log(id);
            var html='';

            $.post('/allchannel',{id:id},function(response){
                //console.log(response.posts);
                $.each(response.posts,function(i,v){
                    console.log(v);
                    var images = v.file.split(',');

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
                                <p class="mb-0"> ${v.title} </p>
                            </blockquote>

                            <div class="row">`;
                            $.each(images,function(k,c){
                                html+=`<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <img src="${c}" alt="" class="img-fluid">
                                </div>`;
                            });
                             html+=   `<div class="col-lg-6 col-md-6 col-sm-12 col-12">
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
    
            $('.list-group li.active a').removeClass('text-white');
            $('.list-group li.active a').addClass('primarytext');
            $('.active').removeClass('active');

            $('.ptopic'+id).addClass('active');
            $('.list-group li.active a').addClass('text-white');
            $('.list-group li.active a').removeClass('primarytext');
            $('#alltopics').hide();
            $('.signup-step-container').hide();
            $('#proj').show();
            $('#projtypeid').val(id);
        })
    });

    </script>
@endsection