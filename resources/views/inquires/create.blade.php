@extends('backendtemplate')

@section('content')
<h2>Create New Inquire</h2>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="post" action="{{route('inquires.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name">
    </div>
  </div>

  <div class="form-group row">
   <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
   <div class="col-sm-10">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked="checked" name="gender">
      <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
      <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
  </div>
</div>
<div class="form-group row">
  <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
  <div class="col-sm-10">
    <input type="text" name="phone" class="form-control" id="inputPhone">
  </div>
</div>

<!-- <div class="form-group row">
  <label for="inputInstallmentDate" class="col-sm-2 col-form-label">Installment Date</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" id="inputInstallmentDate" name="installment_date">
  </div>
</div>

<div class="form-group row">
  <label for="inputAmount" class="col-sm-2 col-form-label">Installment Amount</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" id="inputAmount" name="installment_amount">
  </div>
</div> -->
<div class="form-group row">
  <label for="inputknowledge" class="col-sm-2 col-form-label">Knowledge</label>
  <div class="col-sm-10">
   <textarea class="form-control" name="knowledge" id="inputknowledge" cols="10" rows="3"></textarea>
 </div>
</div>

<div class="form-group row">
  <label for="inputCamp" class="col-sm-2 col-form-label">Camp</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputCamp" name="camp">
  </div>
</div>

<div class="form-group row">
  <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
  <div class="col-sm-10">
    <select name="education_id" class="form-control" id="inputEducation">
      <option value="">Choose Education</option>
      @foreach($educations as $education)
        <option value="{{$education->id}}">{{$education->name}}</option>
      @endforeach
    
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputAcceptedYear" class="col-sm-2 col-form-label">Accepted Year</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputAcceptedYear" name="acceptedyear">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
    <div class="col-sm-10">
      <select name="batch_id" class="form-control" id="inputBatch">
        <option value="">Choose Batch</option>
        @foreach($batches as $batch)
          <option value="{{$batch->id}}">{{$batch->title}}</option>
        @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputTownship" class="col-sm-2 col-form-label">Township</label>
      <div class="col-sm-10">
        <select name="township_id" class="form-control" id="inputTownship">
          <option value="">Choose Township</option>
          @foreach($townships as $township)
            <option value="{{$township->id}}">{{$township->name}}</option>
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