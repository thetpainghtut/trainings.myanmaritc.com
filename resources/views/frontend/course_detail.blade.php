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

  <!-- Page Content -->
    <!-- COURSE -->
    <div class="container my-5">
      <div class="row">
          
        
          <div class="col-lg-8 col-md-8 col-sm-12 my-3">
            <div class="card">
                <div class="card-body">

                  <div class="text-center">
                    
                    <img src="{{$course->outline_photo}}" class="img-fluid w-75 h-50">

                  </div>

                    <h4 class="card-title"> {!! $course->outline !!} </h4>
                </div>
            </div>
          </div>



          <div class="col-lg-4 col-md-4 col-sm-12 my-3">
            <div class="my-4 py-3 px-3 bg-light">
              <p>
                Course Fee : 
                <span>{{$course->fees}} MMK</span>
              </p>
            </div>


            <div class="my-4 py-3 px-3 bg-light">
              <p>
                Time : 
                <span> {{$course->during}}</span>
              </p>
            </div>

            <div class="my-4 py-3 px-3 bg-light">
              <p>
                Duration : 
                <span>{{$course->duration}}</span>
              </p>
            </div>

          </div>


        

      </div>
    </div>
    <!-- COURSE -->
@endsection