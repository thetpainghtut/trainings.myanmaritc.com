@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Quizzez</li>
                </ol>
            </nav>
        </div>
        
    </div>  
    @role('Teacher')    
        @foreach($courses as $course)
            @foreach(Auth::user()->staff->teacher as $teacher_coures)
            @if($teacher_coures->course_id == $course->id)
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
                    @foreach($course->subjects as $subject)
                    
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $subject->name }}
                                            </div>
                                            

                                        </div>
                                        <div class="col-auto">
                                            <img src="{{asset( $subject->logo )}}" width="50px" class="img-fluid">
                                        </div>
                                       
                                    
                                        <div class="col-12">
                                            <form action="{{route('quizzes.show',$subject->id)}}" method="post">
                                                @csrf
                                                @method('GET')
                                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                                <button class="btn btn-outline-secondary m-2 btn-sm d-inline-block" type="submit">
                                                    Quiz
                                                    <span class="pl-2 fas fa-arrow-right"></span>
                                                </button>
                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                   
                </div>
            </div>
            @endif
            @endforeach
        @endforeach
    @endrole
    @role('Mentor')
        <div class="my-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="h3 mb-4 text-gray-800">
                            {{ $courses->name }}
                        </h1>
                        <hr>
                    </div>
                </div>
                
                <div class="row">
                    @foreach($courses->subjects as $subject)
                    
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $subject->name }}
                                            </div>
                                            

                                        </div>
                                        <div class="col-auto">
                                            <img src="{{asset( $subject->logo )}}" width="50px" class="img-fluid">
                                        </div>
                                       
                                    
                                        <div class="col-12">
                                            <form action="{{route('quizzes.show',$subject->id)}}" method="post">
                                                @csrf
                                                @method('GET')
                                                <input type="hidden" name="course_id" value="{{$courses->id}}">
                                                <button class="btn btn-outline-secondary m-2 btn-sm d-inline-block" type="submit">
                                                    Quiz
                                                    <span class="pl-2 fas fa-arrow-right"></span>
                                                </button>
                                                
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                   
                </div>
            </div>
    @endrole
@endsection