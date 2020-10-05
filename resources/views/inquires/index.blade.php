@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Inquires</li>
                </ol>
            </nav>
        </div>
        <!-- <div class="col-2">
            <a href="{{route('lessons.create')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Add New
            </a>
        </div> -->
    </div>  
        
    @foreach($courses as $course)
        <div class="my-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="h3 mb-4 text-gray-800">
                        {{ $course->name }}
                    </h1>
                    <hr>
                </div>
            </div>
            
            <div class="row">
                @foreach($course->batches as $batch)
                @php
                $today_date = Carbon\Carbon::now()->toDateString();
                
                 $next_fiveday = Carbon\Carbon::create($batch->startdate)->addDay(5)->toDateString();
                 
                @endphp
                @if($next_fiveday >= $today_date)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $batch->title }}
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 
                                           @php
                                           $inquires = $batch->inquires->count();
                                           @endphp
                                           {{$inquires}} Students

                                        </div>

                                    </div>
                                   
                                
                                    <div class="col-12">
                                        <a href="{{route('inquires.show',$batch->id)}}" class="btn btn-outline-secondary m-2 btn-sm">
                                            View Inquire
                                            <span class="pl-2 fas fa-arrow-right"></span>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
                @endforeach

                <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            Postpone
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 

                                        @php
                                            $total_inquires=0;
                                            $course_batches =$course->batches;
                                        @endphp
                                        @foreach($course_batches as $batch)
                                            @foreach($batch->inquires as $inquire)
                                                @if($inquire->message != null)
                                                    @php
                                                    $total_inquires +=1;
                                                    @endphp
                                                @endif

                                            @endforeach
                                        @endforeach
                                          {{ $total_inquires}}

                                        </div>

                                    </div>
                                   
                                
                                    <div class="col-12">
                                        <a href="{{route('postpone_list',$course->id)}}" class="btn btn-outline-secondary m-2 btn-sm">
                                            View Inquire
                                            <span class="pl-2 fas fa-arrow-right"></span>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    @endforeach
@endsection