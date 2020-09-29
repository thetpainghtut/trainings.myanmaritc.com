@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inquires.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('inquires.show',$batch->id)}}"> {{ $batch->title }} </a></li>

                    <li class="breadcrumb-item active" aria-current="page"> Inquire</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('inquires.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Inquire
               
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('inquires.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                        
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
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
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputPhone">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputknowledge" class="col-sm-2 col-form-label">Knowledge</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('knowledge') is-invalid @enderror" name="knowledge" id="inputknowledge" cols="10" rows="3"></textarea>
                        @if($errors->has('knowledge'))
                            <span class="text-danger">{{$errors->first('knowledge')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Camp</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCamp1" value="yes" name="camp">
                            <label class="form-check-label" for="inlineCamp1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="camp" id="inlineCamp2" value="no" checked="checked">
                            <label class="form-check-label" for="inlineCamp2">No</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
                    <div class="col-sm-10">
                        <select name="education_id" class="form-control js-example-basic-single" id="inputEducation">
                            @foreach($educations as $education)
                                <option value="{{$education->id}}">{{$education->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAcceptedYear" class="col-sm-2 col-form-label">Accepted Year</label>
                    <div class="col-sm-10">
                        <input type="text" value="" class="form-control yearpicker @error('acceptedyear') is-invalid @enderror" id="inputAcceptedYear" name="acceptedyear" minlength="4" maxlength="4">
                        @if($errors->has('acceptedyear'))
                            <span class="text-danger">{{$errors->first('acceptedyear')}}</span>
                        @endif
                    </div>
                </div>
              
                <div class="form-group row">
                    <label for="inputCourse" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="inputCourse" disabled="">
                            <option value="">Choose Course</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}" {{ ($course->id == $batch_course->id)? "selected":"" }}>{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <div class="form-group row" id="inputBatch">
                  
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

        $('.js-example-basic-single').select2({
            theme: 'bootstrap4',

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#inputCourse').change(function(){
            var course_id = $(this).val();
            console.log(course_id);
            $.post('/getBatches',{course_id:course_id},function(response){
                console.log(response);
                var batches_data =`<label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
                                    <div class="col-sm-10">
                                        <select name="batch_id" class="form-control" >
                                        <option>Choose Batch</option>
                                       `;
                                            $.each(response,function(i,v) {
                                            batches_data+=`<option value="${v.id}">${v.title} (${v.startdate})</option>`;
                                            })
                batches_data+=`</select></div>`;
                $('#inputBatch').html(batches_data);
            })
        })

        $(function() {

            var course_id = $("#inputCourse").val();
            //console.log(course_id);
            $.post('/getBatches',{course_id:course_id},function(response){
               // console.log(response);
                var batches_data =`<label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
                                    <div class="col-sm-10">
                                        <select name="batch_id" class="form-control">
                                        `;
                                            $.each(response,function(i,v) {
                                            batches_data+=`<option value="${v.id}">${v.title} (${v.startdate})</option>`;
                                            })
                batches_data+=`</select></div>`;
                $('#inputBatch').html(batches_data);
            })

        })
    })
</script>
@endsection