@extends('backendtemplate')
@section('content')
  <h2 class="d-inline-block">All Mentor List</h2>
  <a href="{{route('mentors.create')}}" class="btn btn-info float-right">Add New</a>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($mentors as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->user->name}}</td>
        <td>{{$row->user->email}}</td>
        <td>{{$row->phone}}</td>
        <td>
          <a href="#" class="btn btn-primary">Detail</a>
          <a href="{{route('mentors.edit',$row->id)}}" class="btn btn-warning">Edit</a>
         
          <form method="post" action="{{route('mentors.destroy',$row->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection