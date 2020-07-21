@extends('backendtemplate')

@section('content')
  <h2 class="text-center"> Grades Print -> Courses </h2>

    
    <h2 class="d-inline-block">{{$coursename}}</h2>
  
    <div class="row">
      @foreach($batches as $row)
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow my-3">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="h5 mb-2 font-weight-bold text-gray-800">
                    {{$row->title}}
                  </div>

                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    {{date('d M , Y',strtotime($row->startdate))}} - {{date('d M , Y',strtotime($row->enddate))}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  

@endsection