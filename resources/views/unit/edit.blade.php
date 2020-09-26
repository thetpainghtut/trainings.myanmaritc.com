@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Units (For Grades) </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Unit
                <a href="{{route('units.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
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

            <form method="post" action="{{route('units.update',$unit->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$unit->description}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select name="course_id" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}" <?php if($course->id==$unit->course_id) { ?>  selected <?php }; ?> > {{$course->name}} </option>
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

        </div>
    </div>


  
  

@endsection