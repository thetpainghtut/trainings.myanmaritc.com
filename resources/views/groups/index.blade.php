@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Groups</h2>

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

      @if($batchid !=0)
      <div class="form-group col-md-2 text-right mt-2">

        <a name="btnSelect" href="{{asset('grade_print/'.$batchid)}}" role="button" class="btn btn-outline-primary mt-4"><i class="fas fa-print fa-sm"></i> Print Grades </a>
    
      </div>
      @endif

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
          <a href="{{route('groups.show',$row->id)}}" class="btn btn-primary"><i class="fas fa-info"></i></a></a>
          <a href="{{route('groups.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
         
          <form method="post" action="{{route('groups.destroy',$row->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            {{-- @if($row->trashed())
              <button type="submit" class="btn btn-danger">Restore</button>
            @else --}}
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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