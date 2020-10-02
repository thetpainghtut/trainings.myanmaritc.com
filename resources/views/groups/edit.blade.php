@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Groups </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Edit Groups
                <a href="{{route('groups.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
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

            <form method="post" action="{{route('groups.update',$group->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="batch_data_id" value="{{$batchid}}">
                <input type="hidden" name="course_data_id" value="{{$courseid}}">
                
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$group->name}}">
                        <input type="hidden" name="batch_id" value="{{$group->batch_id}}">
                    </div>
                </div>

                <div class="form-row">

                        <label for="inputCourse" class="col-sm-2 col-form-label">Choose Students:</label>
                        <div class="col-sm-10">
                            <select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">
                                

                                    @foreach($batch_data->students as $batch_student)

                                    @if($batch_student->pivot->status == 'Active' & $batch_student->status == null)

                                    <option 
                                    @foreach($group->students as $group_student) @if($group_student->id == $batch_student->id){{'selected'}} @endif  @endforeach value="{{$batch_student->id}}">
                                    {{$batch_student->namee}}
                                    </option>

                                    @endif

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