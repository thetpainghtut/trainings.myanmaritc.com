@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Project Types </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Project Types
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Project Name</th>
                            <th>User Name</th>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @foreach($projecttypes as $projtype)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$projtype->name}}</td>
                            <td>{{$projtype->user->name}}</td>
                            <td>@foreach($projtype->courses as $p) {{$loop->first ? '':', '}}{{$p->name}} @endforeach</td>
                            <td>
                                <a href="#" class="btn btn-info">Assign</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection