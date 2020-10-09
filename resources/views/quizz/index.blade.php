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

        @endforeach
@endsection