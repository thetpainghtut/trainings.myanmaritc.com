@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Courses</h2>
  <a href="{{route('courses.create')}}" class="btn btn-info float-right">Add New</a>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fees</th>
        <th>During</th>
        <th>Duration</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($courses as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->fees}}</td>
        <td>{{$row->during}}</td>
        <td>{{$row->duration}}</td>
        <td>
          <a href="#" class="btn btn-primary">Detail</a>
          <a href="{{route('courses.edit',$row->id)}}" class="btn btn-warning">Edit</a>
         
          <form method="post" action="{{route('courses.destroy',$row->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            @if($row->trashed())
              <button type="submit" class="btn btn-danger">Restore</button>
            @else
              <button type="submit" class="btn btn-danger">Delete</button>
            @endif
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection