@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Groups</h2>
  {{-- <a href="{{route('courses.create')}}" class="btn btn-info float-right">Add New</a> --}}

  <form method="get" action="{{route('groups.index')}}">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCourse">Choose Course:</label>
        <select name="course" class="form-control" id="course">
          @foreach($courses as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="inputCourse">Choose Batch:</label>
        <select name="batch" class="form-control" disabled="disabled" id="batch">
          @foreach($batches as $row)
          <option value="{{$row->id}}">{{$row->title}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-2 mt-2">
        <button type="submit" class="btn btn-primary mt-4">Search</button>
      </div>

    </div>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>No of Students</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($groups as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->name}}</td>
        <td>{{count($row->students)}}</td>
        <td>
          <a href="{{route('groups.show',$row->id)}}" class="btn btn-primary">Detail</a>
          <a href="{{route('groups.edit',$row->id)}}" class="btn btn-warning">Edit</a>
         
          <form method="post" action="{{route('groups.destroy',$row->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            {{-- @if($row->trashed())
              <button type="submit" class="btn btn-danger">Restore</button>
            @else --}}
              <button type="submit" class="btn btn-danger">Delete</button>
            {{-- @endif --}}
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection