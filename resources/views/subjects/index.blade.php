@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Subjects</h2>
  <a href="{{route('subjects.create')}}" class="btn btn-info float-right"> <i class="fas fa-plus"></i>Add New</a>

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
      @foreach($subjects as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->course->name}} ( {{$row->course->location->city->name}} )</td>
        <td>
          {{--<a href="#" class="btn btn-primary">Detail</a>--}}
          <a href="{{route('subjects.edit',$row->id)}}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
          </a>
         
          <form method="post" action="{{route('subjects.destroy',$row->id)}}" class="d-inline-block">
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