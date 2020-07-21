@extends('backendtemplate')

@section('content')
  <h2>Create Groupss</h2>

  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  
  <form method="post" action="{{route('groups.store')}}">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCourse">Select Course:</label>
        <select name="course" class="form-control" id="course">
          <option value="">Choose Course</option>
          @foreach($courses as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="inputCourse">Select Batch:</label>
        <select name="batch" class="form-control" disabled="disabled" id="batch">
          <option value="">Choose Batch</option>
          @foreach($batches as $row)
          <option value="{{$row->id}}">{{$row->title}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName">Group Name:</label>
        <input type="text" name="name" id="inputName" class="form-control">
      </div>

      <div class="form-group col-md-6">
        <label for="inputCourse">Choose Students:</label>
        <select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-lg btn-primary btn-block">Create</button>
      </div>
    </div>
  </form>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection