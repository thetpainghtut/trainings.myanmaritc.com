@extends('backendtemplate')

@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Batches </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Batch
                <a href="{{route('batches.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('batches.store')}}">
                @csrf
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" value="{{old('title')}}">

                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif

                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('startdate') is-invalid @enderror" id="inputStartDate" name="startdate" value="{{old('startdate')}}">

                        @if($errors->has('startdate'))
                            <span class="text-danger">{{$errors->first('startdate')}}</span>
                        @endif
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEndDate" class="col-sm-2 col-form-label">End date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('enddate') is-invalid @enderror" id="inputEndDate" name="enddate" value="{{old('enddate')}}">

                        @if($errors->has('enddate'))
                            <span class="text-danger">{{$errors->first('enddate')}}</span>
                        @endif

                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('time') is-invalid @enderror" id="inputTime" name="time" value="{{old('time')}}">

                        @if($errors->has('time'))
                            <span class="text-danger">{{$errors->first('time')}}</span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputLocation" class="col-sm-2 col-form-label">Locations</label>
                    <div class="col-sm-10">
                        <select name="location" class="form-control course_change" id="inputLocation">
                            <option value="">Choose Locations</option>
                            @foreach($locations as $location)
                                <option value="{{$location->id}}"> {{$location->name}} </option>
                                <span data-city={{ $location->city->id }}></span>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputCourse" class="col-sm-2 col-form-label">Courses</label>
                    <div class="col-sm-10">
                        <select name="course" class="form-control course_change" id="inputCourse">
                            <option value="">Choose Course</option>
                            @foreach($courses as $row)
                                <option value="{{$row->id}}"> {{$row->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                

                <div class="form-group row">
                    <label for="inputTeacher" class="col-sm-2 col-form-label">Teacher</label>
                    <div class="col-sm-10 ">
                        <select name="teachers[]" class="form-control js-example-basic-multiple teacher" id="inputTeacher" multiple="multiple" disabled="">
                        </select>   
                    </div>
                </div>

                <div class="form-group row mentor_div">
                    <label for="inputMentor" class="col-sm-2 col-form-label">Mentor</label>
                    <div class="col-sm-10 ">
                        <select name="mentors[]" class="form-control js-example-basic-multiple mentor" id="inputMentor" multiple="multiple" disabled="">
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

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.course_change').change(function () {
            var cid = $(this).val();
            var city= $(this).data("city");
     
            $.post("/show_mentor",{id:cid,city:city},function (res) {
        
                var data = JSON.parse(res);

                $('.teacher').prop('disabled',false);

                var html ='' ;
                var mentor='';
                
                $.each(data,function (i,v) {
                    // console.log(data.mentor);
          
                    for (var i = 0; i < v[0].teachers.length; i++) {
                    // console.log( v[0].teachers[i])

                        html +=`<option value="${v[0].teachers[i].tid}">
                                ${v[0].teachers[i].name}
                            </option>`;
                    }
            
                    if(v[0].mentors.length>0)
                    {
                        $('.mentor_div').show(1000);
                        $('.mentor').prop('disabled',false);
                        $('.mentor').prop('required',true);
                        for (var i = 0; i < v[0].mentors.length; i++) {
                        // console.log( v[0].mentors[i])
                            mentor +=`<option value="${v[0].mentors[i].mid}" >
                                        ${v[0].mentors[i].name}
                                    </option>`;
                        }  
                    }
                    else{
                        $('.mentor').prop('required',false);
                        $('.mentor_div').hide(1000);
                    }
                
       
                    // html +=`<input type="checkbox" name="teachers[]" class='mx-2 my-2' value="${v[0].teachers[i].id}">${v[0].teachers[i].id}`;
                
                

                    //  for (var i = 0; i < v[0].mentors.length; i++) {
                        // console.log( v[0].mentors[i])
                 
                    //  mentor +=`<input type="checkbox" class='mx-2 my-2' name="mentors[]" value="${v[0].mentors[i].id}">${v[0].mentors[i].name}`;
                    // }  
                });
                
                $('.teacher').html(html);
                if(mentor)
                {
                    $('.mentor').html(mentor);
                }
            })
        });
    })
  </script>
@endsection


