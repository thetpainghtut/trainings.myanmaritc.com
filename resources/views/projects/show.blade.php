@extends('backendtemplate')

@section('content')
    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Project</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
             <form method="get" action="{{route('projects.create')}}" class="d-inline-block float-right">
               
                   <input type="hidden" name="pb" value="{{$batch->id}}">
                   <input type="hidden" name="pbd" value="{{$pjid}}">
                    <button class="btn btn-outline-primary btn-sm"> <i class="fas fa-plus mr-2"></i>Add New </button>
               </form>
        </div>
    </div> 
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $batch->title}}   <small>({{$projecttype->name}})</small>
            </h5>
        </div>
        <div class="card-body">
    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Project Title</th>
                                <th>No of Student</th>
                                <th>Student Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                                $batchprojtypes =$batch->projecttypes;
                                
                            @endphp
                           @foreach($project as $pp)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$pp->title}}</td>
                                @php 
                                $students = $pp->students;
                                @endphp
                                <td>{{count($students)}}</td>
                                <td>
                                    @foreach($students as $stu)
                                    {{$loop->first ? '':', '}}{{$stu->namee}}
                                    @endforeach
                                </td>
                                
                             
                                <td>
                                    <a href="{{route('projectedit',['b'=>$batch->id,'pj'=>$pp->id])}}" class="btn btn-warning btn-sm" >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                
                            </tr>
                            @endforeach
                            @if($batchprojtypes->isEmpty())
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

  

    

@endsection
