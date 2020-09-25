@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Batches </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Edit Exsiting Batch
                <a href="{{route('batches.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
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

            <form method="post" action="{{route('batches.update',$batch->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" value="{{$batch->title}}">
                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="offline_id" value="Offline" {{ ($batch->type=="Offline")? "checked" : "" }}>
                            <label class="form-check-label" for="offline_id"> Offline </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="online_id" value="Online" {{ ($batch->type=="Online")? "checked" : "" }}>
                            <label class="form-check-label" for="online_id"> Online </label>
                        </div>

                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputStartDate" name="startdate" value="{{$batch->startdate}}">
                        @if($errors->has('startdate'))
                            <span class="text-danger">{{$errors->first('startdate')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEndDate" class="col-sm-2 col-form-label">End date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputEndDate" name="enddate" value="{{$batch->enddate}}">
                        @if($errors->has('enddate'))
                            <span class="text-danger">{{$errors->first('enddate')}}</span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTime" name="time" value="{{$batch->time}}">
                        @if($errors->has('time'))
                            <span class="text-danger">{{$errors->first('time')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputLocation" class="col-sm-2 col-form-label">Locations</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="location" value="{{ $location->id }}">
                        <input type="text" class="form-control" id="inputLocation" value="{{ $location->name }} " disabled="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputCourse" class="col-sm-2 col-form-label">Courses</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="course" value="{{$batch->course->id}}">
                        <input type="text" class="form-control" id="inputCourse" value="{{$batch->course->name}} " disabled="">
                    </div>
                </div>

                

                <div class="form-group row">
                    <label for="inputTeacher" class="col-sm-2 col-form-label">Teacher</label>
                    <div class="col-sm-10">
                        <select name="teachers[]" class="form-control js-example-basic-multiple" id="inputTeacher" multiple="multiple">
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}"  @foreach($batch->teachers as $bat) <?php if($teacher->id==$bat->id) { ?> selected <?php }; ?> @endforeach >{{$teacher->staff->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                @foreach($courses as $course)
                    @if(count($batch->mentors)>0 || $course->mentor)
                
                    <div class="form-group row">
                        <label for="inputMentor" class="col-sm-2 col-form-label">Mentor</label>
                        <div class="col-sm-10">
                            <select name="mentors[]" class="form-control js-example-basic-multiple" id="inputMentor" multiple="multiple">
                      
                                @foreach($mentors as $mentor)
                                    <option value="{{$mentor->id}}"   @foreach($batch->mentors as $bat) <?php if($mentor->id==$bat->id) { ?> selected <?php }; ?>  @endforeach >{{$mentor->staff->user['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                @endforeach

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
  

@endsection

