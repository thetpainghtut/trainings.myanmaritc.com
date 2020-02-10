@extends('backendtemplate')
@section('content')
  <h2 class="d-inline-block">All Student List</h2>
  <a href="{{route('students.create')}}" class="btn btn-info float-right">
     <i class="fas fa-plus"></i>
  Add New</a>

  <form method="get" action="{{route('students.index')}}">
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

      <div class="form-group col-md-2 text-right mt-2">

        {{--<a name="btnSelect" href="{{route('export',$row->id)}}" role="button" class="btn btn-info mt-4"><i class="fas fa-upload fa-sm"></i> Generate Excel</a>--}}
    
      </div>
    </div>
  </form>

  @isset($groups)
    @if(count($groups) > 0)
      <table class="table table-bordered my-3">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Batch</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
          <tr>
            <td colspan="6" class="bg-dark text-white">{{$group->name}} Group</td>
          </tr>
            @php
              $i = 1;
            @endphp

            @foreach($group->students as $row)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$row->namee}}</td>
              <td>{{$row->email}}</td>
              <td>{{$row->phone}}</td>
              <td>{{$row->batch->course->name}} - {{$row->batch->title}}</td>
              <td>
                <a href="{{route('students.show',$row->id)}}" class="btn btn-primary">Detail</a>
                <a href="{{route('students.edit',$row->id)}}" class="btn btn-warning">Edit</a>
               
                <form method="post" action="{{route('students.destroy',$row->id)}}" class="d-inline-block">
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
          @endforeach
        </tbody>
      </table>
    @else
      <h2>Please, Create Group!!!</h2>
    @endif
  @else
    <table class="table table-bordered my-3">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone No</th>
          <th>Batch</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($students as $row)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$row->namee}}</td>
          <td>{{$row->email}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->batch->course->name}} - {{$row->batch->title}}</td>
          <td>
            <a href="{{route('students.show',$row->id)}}" class="btn btn-primary">Detail</a>
            <a href="{{route('students.edit',$row->id)}}" class="btn btn-warning">Edit</a>
           
            <form method="post" action="{{route('students.destroy',$row->id)}}" class="d-inline-block">
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
  @endif
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection