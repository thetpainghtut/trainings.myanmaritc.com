@extends('backendtemplate')

@section('content')
    <h2 class="d-inline-block">{{$group->name}}</h2> (Batch - <span>{{$group->batch->title}}</span>)
  

    <div class="row">
        @foreach($group->students as $row)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow my-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-2 font-weight-bold text-gray-800">{{$row->namee}}</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$row->education}}</div>
                            <div class="h5 my-2 font-weight-bold text-gray-800">

                                {{-- @if($row->units && count($row->units)>0) --}}
                                  {{-- <a href="{{route('grading_pdf',$row->id)}}" class="btn btn-secondary" target="_blank">Complete<span class="pl-2 fas fa-arrow-right"></span></a>
                                @else --}}
                                <a href="{{route('grading_form',$row->id)}}" class="btn btn-outline-secondary">Give Remark <span class="pl-2 fas fa-arrow-right"></span></a>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection