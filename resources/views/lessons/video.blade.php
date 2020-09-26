@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{ $subject->name }} </li>
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
            <h5 class="m-0 font-weight-bold text-primary"> {{ $subject->name }} Lesson
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th> Duration </th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($lessons as $lesson)
                        <tr>
                            <td>{{$i++}}</td>
                            <td> {{ $lesson->title }} </td>
                            <td> {{ gmdate("H:i:s", $lesson->duration )}} mins  </td>

                            <td>
                                <a href="{{route('lessons.show',$lesson->id)}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-info"></i>
                                </a>

                                <a href="{{route('lessons.edit',$lesson->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                             
                                <form method="post" action="{{route('lessons.destroy',$lesson->id)}}" class="d-inline-block">
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
