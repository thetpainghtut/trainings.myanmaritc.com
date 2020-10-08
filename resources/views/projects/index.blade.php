@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Projects</li>
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
                   
                    @php
                    $now = Carbon\Carbon::now();
                    
                    $batches = App\Batch::where('course_id','=',$course->id)->where('startdate','<=',$now)->where('enddate','>=',$now)->get();
                   
                    
                    @endphp
                    @foreach($batches as $b)
                        @php $bprojs = $b->projecttypes; @endphp
                        @foreach($bprojs as $bproj)
                        @if($bproj->pivot->batch_id == $b->id)
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $b->title }}
                                            </div>
                                            <div class="h5 mb-0 text-gray-800 p-3">
                                                {{ $bproj->name }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 
                                               

                                            </div>

                                        </div>
                                       
                                    
                                        <div class="col-12">

                                            <a href="{{route('projectshow',['bid'=>$b->id,'pjid'=>$bproj->pivot->projecttype_id])}}" class="btn btn-outline-secondary m-2 btn-sm">
                                                View Project
                                                <span class="pl-2 fas fa-arrow-right"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if($bprojs->isEmpty())
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $b->title }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 
                                               

                                            </div>

                                        </div>
                                       
                                    
                                        <div class="col-12">
                                            <a href="#" class="btn btn-outline-secondary m-2 btn-sm disabled">
                                                View Project
                                                <span class="pl-2 fas fa-arrow-right"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
               
                    @if($batches->isEmpty())
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Now Current Batch Does Not Have
                                            </div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 
                                               

                                            </div>

                                        </div>
                                       
                                    
                                        <div class="col-12">
                                            <a href="#" class="btn btn-outline-secondary m-2 btn-sm disabled">
                                                View Project
                                                <span class="pl-2 fas fa-arrow-right"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        @endforeach
@endsection