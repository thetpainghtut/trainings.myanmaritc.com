@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('projectshow',['bid'=>$batch->id,'pjid'=>$p])}}"> {{ $batch->title }} </a></li>

                    <li class="breadcrumb-item active" aria-current="page"> Project</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('projects.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Project
               
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('projects.store')}}">
                @csrf
                <input type="hidden" name="prjid" value="{{$p}}">
                <input type="hidden" name="batch" value="{{$batch->id}}">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Project Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputName" name="title">
                        
                        @if($errors->has('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                </div>
              
                <div class="form-group row">
                    <label for="inputCourse" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="inputCourse" disabled="">
                          <option value="{{$batch->course->id}}">{{$batch->course->name}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="inputBatch" disabled="">
                          <option value="{{$batch->id}}">{{$batch->title}}</option>
                        </select>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="inputStudent" class="col-sm-2 col-form-label">Select Student:</label>
                    <div class="col-sm-10">
                        <select name="student[]" class="js-example-basic-multiple form-control" id="inputStudent" multiple="multiple">
                           
                            @foreach($batch->students as $bstudent)
                            @foreach($bstudent->projects as $bproj)
                            @if($bproj->projecttype_id != $p)
                            <option value="{{$bstudent->id}}">{{$bstudent->namee}}</option>
                            @endif
                            @endforeach
                            @if($bstudent->projects->isEmpty())
                             <option value="{{$bstudent->id}}">{{$bstudent->namee}}</option>
                            @endif
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

@section('script')
<script type="text/javascript">
    $(document).ready(function(){

        $('.js-example-basic-multiple').select2({
            placeholder: "Choose Member",
            theme: 'bootstrap4',

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      
    })
</script>
@endsection