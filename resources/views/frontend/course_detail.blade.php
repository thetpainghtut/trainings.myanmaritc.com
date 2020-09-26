@extends('template')
@section('content')
    <!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="display-4 text-white mt-5 mb-2"> {{$course->name}} </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- COURSE -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 order-lg-1 order-md-2 order-sm-2 order-xs-2"> 
                <img class="img-fluid" src="{{$course->outline_photo}}">
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order-md-1 order-sm-1 order-xs-1 p-5">
                <div class="bg-light mt-5 pt-3 pb-1 pl-3 pr-3">
                    <p> Course Fee : <span class="float-right"> {{$course->fees}} MMK </span> </p>
                </div>

                <div class="bg-light mt-3 pt-3 pb-1 pl-3 pr-3">
                    <p> Schedule : <span class="float-right"> {{$course->during}} </span> </p>
                </div>

                <div class="bg-light mt-3 pt-3 pb-1 pl-3 pr-3">
                    <p> Duration : <span class="float-right"> {{$course->duration}} </span> </p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <p> {!! $course->outline !!} </p>
            </div>
        </div>

        
        

      </div>
    </div>
    <!-- COURSE -->
@endsection