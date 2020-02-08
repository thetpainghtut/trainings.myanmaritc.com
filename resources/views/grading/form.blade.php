@extends('backendtemplate')

@section('content')
  <h2 class="text-center">Grading Form</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('grading.store')}}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="student_id" value="{{$student->id}}">
    
    @foreach($units as $row)
    <div class="form-group">
      <label for="label{{$row->id}}" class="col-form-label">{{$row->description}}</label>
      <input type="number" class="form-control" id="label{{$row->id}}" name="unit{{$row->id}}">
    </div>
    @endforeach
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection