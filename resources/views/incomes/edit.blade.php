@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">Edit Income</h2>
  <a href="{{route('incomes.index')}}" class="btn btn-info float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
   <form method="post" action="{{route('incomes.update',$income->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Amount</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputName" name="amount" value="{{$income->amount}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputOutline" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputOutline" name="description">{{$income->description}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFees" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputFees" name="date" value="{{$income->date}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="locationid" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
         <select class="form-control" id="locationid" name="location_id">
           <option disabled value="">Please select one</option>
           @foreach($locations as $location)
            <option value="{{$location->id}}" <?php if($location->id == $income->location_id){ echo "selected";}?>>{{$location->name}}</option>
           @endforeach
         </select>
      </div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
 
@endsection