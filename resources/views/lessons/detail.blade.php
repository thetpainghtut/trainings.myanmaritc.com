@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('view_lesson',$subject->id)}}"> {{ $subject->name }} </a></li>

                    <li class="breadcrumb-item active" aria-current="page"> {{ $lesson->title }} </li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('lessons.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $lesson->title }}
            </h5>
            <h6> {{ gmdate("H:i:s", $lesson->duration )}} mins </h6>
        </div>
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ asset($lesson->file) }}" allowfullscreen></iframe>
            </div>
        </div>
    </div>


@endsection
