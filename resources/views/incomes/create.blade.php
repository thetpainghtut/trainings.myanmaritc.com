@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Incomes </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Income
                <a href="{{route('incomes.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('incomes.store')}}">
                @csrf
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
                    <label for="locationid" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="locationid" name="location_id">
                            <option disabled value="">Please select one</option>
                            @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
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
        </div>
    </div>

@endsection