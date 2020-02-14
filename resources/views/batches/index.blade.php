@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Batches</h2>
  <a href="{{route('batches.create')}}" class="btn btn-info float-right">Add New</a>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Course Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($batches as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->title}}</td>
        <td>{{$row->startdate}}</td>
        <td>{{$row->enddate}}</td>
        <td>{{$row->course->name}}</td>
        <td>
          <a href="#" class="btn btn-primary"><i class="fas fa-info"></i></a>
          <a href="{{route('batches.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
          <form method="post" action="{{route('batches.destroy',$row->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection