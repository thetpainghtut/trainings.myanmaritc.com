@extends('backendtemplate')

@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Units (For Grades) </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Grades
                <a href="{{route('units.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">
            @if(session()->has('limit_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>SORRY!</strong> {{ session()->get('limit_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($units as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->course->name}}</td>
                                <td>
                                    <a href="{{route('units.edit',$row->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                             
                                    <form method="post" action="{{route('units.destroy',$row->id)}}" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection