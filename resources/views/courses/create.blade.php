@extends('backendtemplate')

@section('content')
  <h2>Create New Course</h2>
  
  <form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))
          <span class="text-danger">{{$errors->first('name')}}</span>
        @endif

      </div>
    </div>
    <div class="form-group row">
      <label for="inputFile" class="col-sm-2 col-form-label">Logo</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputFile" name="logo">
        @if($errors->has('logo'))
          <span class="text-danger">{{$errors->first('logo')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputOutline" class="col-sm-2 col-form-label">Outlines</label>
      <div class="col-sm-10">
        <textarea class="form-control @error('outlines') is-invalid @enderror" id="inputOutline" name="outlines">{{ old('outlines') }}</textarea>
        @if($errors->has('outlines'))
          <span class="text-danger">{{$errors->first('outlines')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFees" class="col-sm-2 col-form-label">Fees</label>
      <div class="col-sm-10">
        <input type="number" class="form-control @error('fees') is-invalid @enderror" id="inputFees" name="fees" value="{{ old('fees') }}">
        @if($errors->has('fees'))
          <span class="text-danger">{{$errors->first('fees')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuring" class="col-sm-2 col-form-label">During</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('during') is-invalid @enderror" id="inputDuring" name="during" value="{{ old('during') }}">
        @if($errors->has('during'))
          <span class="text-danger">{{$errors->first('during')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="inputDuration" name="duration" value="{{ old('duration') }}">
        @if($errors->has('duration'))
          <span class="text-danger">{{$errors->first('duration')}}</span>
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuration" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
        <select name="location" class="form-control">
        @foreach($locations as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection