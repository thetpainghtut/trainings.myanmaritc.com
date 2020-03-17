@extends('template')
@section('content')
  <!-- Header -->
  <header class="py-5 mb-5 header_img">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h1 class="display-4 text-white mt-5 mb-2"> All Courses </h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
    <!-- COURSE -->
    <div class="container my-5">
      <div class="row">
          
        @foreach($courses as $row)
          <div class="col-lg-4 col-md-6 col-sm-12 my-3">
            <div class="card">
                <img class="card-img-top course_img" src="{{asset($row->logo)}}" alt="Card image cap">
                <div class="position-absolute float-right  mt-2 ml-2">
                    <span class="badge badge-pill badge-success float-right p-2"> {{$row->during}} </span>
                </div>
                <div class="card-body">
                    <h4 class="card-title"> {{$row->name}} </h4>
                    <a href="{{route('course_detail',$row->id)}}" class="btn btn-outline-primary btn-block">Find Out More!</a>

                </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
    <!-- COURSE -->
@endsection