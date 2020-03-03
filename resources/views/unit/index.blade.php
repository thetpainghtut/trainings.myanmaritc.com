@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Grades </h2>
  <a href="{{route('units.create')}}" class="btn btn-info float-right"> <i class="fas fa-plus"></i>Add New</a>

  @if(session()->has('limit_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>SORRY!</strong> {{ session()->get('limit_message') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($units as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->description}}</td>
        <td>{{$row->course->name}}</td>
        <td>
          {{--<a href="#" class="btn btn-primary">Detail</a>--}}
          <a href="{{route('units.edit',$row->id)}}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
          </a>
         
          <form method="post" action="{{route('units.destroy',$row->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')">
                <i class="fas fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection