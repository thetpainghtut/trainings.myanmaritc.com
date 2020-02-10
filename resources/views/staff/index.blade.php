@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Staffs</h2>
  <a href="{{route('staffs.create')}}" class="btn btn-info float-right">
    <i class="fas fa-plus"></i>
  Add New</a>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>NRC</th>
        <th>DOB</th>
        <th>Action</th>
      </tr>
    </thead>
    
  </table>
@endsection