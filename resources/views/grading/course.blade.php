@extends('backendtemplate')

@section('content')
  <h2 class="text-center"> Grades Print -> Courses </h2>

  @foreach($cities as $city)
    
    <h2 class="d-inline-block">{{$city->name}}</h2>
  
    <div class="row">
      @foreach($courses as $row)
      @if($row->location->city['id'] == $city->id)
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow my-3">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h5 mb-2 font-weight-bold text-gray-800">{{$row->name}}</div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('grades.show', $row->id) }}"> 
                <b> {{ count($row->batches) }} </b> Batches Found
                <span class="float-right"> <i class="fas fa-forward"></i> </span>
              </a>
                
            </div>
          </div>
        </div>
      @endif
      @endforeach
    </div>
  
  @endforeach

@endsection