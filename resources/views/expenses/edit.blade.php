@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">Edit Expense</h2>
  <a href="{{route('expenses.index')}}" class="btn btn-info float-right">Go Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container">
   <form method="post" action="{{route('expenses.update',$expense->id)}}">
    @csrf
    <div class="form-group row">
      <label for="locationid" class="col-sm-2 col-form-label">Select Type</label>
      <div class="col-sm-10">
         <select name="type" class="form-control" id="type">
            <option disabled value="">Please Select Year</option>
            <option value="PHP">PHP</option>
            <option value="Recruitment">Recruitment</option>
            <option value="HR">HR</option>
            <option value="General">General</option>
          </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Amount</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputName" name="amount">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputOutline" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputOutline" name="description"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFees" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputFees" name="date">
      </div>
    </div>

    <div class="form-group row">
        <label for="add_file" class="col-sm-2 col-form-label">Select File</label>
        <div class="col-sm-10">
            <input name="attachments" ref="add_file" type="file" class="form-control-file" id="add_file" multiple @change="fileHandle">
            <img v-for="image in images" :src="image" class="preview" width="50" height="50">
        </div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
 </div>
@endsection