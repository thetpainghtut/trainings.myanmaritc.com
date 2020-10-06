@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Posts </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Post
                <a href="{{route('posts.index')}}" class="btn btn-outline-primary btn-sm d-inline-block float-right"><i class="fas fa-angle-double-left mr-2"></i>Go Back</a>
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

            <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="form-group row" id="subjectDiv">
                    <label for="topicName" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="topic" id="topicName">
                            <option>Choose One</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}" data-name="{{$topic->name}}">{{$topic->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row" id="other">
                    <label for="inputLogo" class="col-sm-2 col-form-label"> Photo </label>
                    <div class="col-sm-10">
                        <input name="image[]" type="file" class="form-control" id="inputLogo" multiple>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        <div id="preview_img"></div>
                    </div>
                </div>

                <div class="form-group row" id="sub">
                    <label for="inputsub" class="col-sm-2 col-form-label"> Subject </label>
                    <div class="col-sm-10">
                        
                            <select class="form-control" name="subject">
                                <option selected disabled>Choose One</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            
                      
                       
                        <!-- <input name="image[]" type="file" class="form-control" id="inputsub" multiple>
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        <div id="preview_img"></div> -->
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputOutline" class="col-sm-2 col-form-label"> Content </label>
                    <div class="col-sm-10">
                        <textarea id="summernote" class="form-control"  name="content">{{ old('content') }}</textarea>
                    </div>
                </div>

                @role('Teacher')
                <div class="form-group row" id="subjectDiv">
                    <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="batch" id="batchName">
                            <option>Choose One</option>
                            @foreach($batches as $batch)
                                <option value="{{$batch->batch_id}}" id="b">{{$batch->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endrole
                @role('Admin')
                <div class="form-group row" id="subjectDiv">
                    <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="batch" id="batchName">
                            <option>Choose One</option>
                            @foreach($batches as $batch)
                                <option value="{{$batch->id}}">{{$batch->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endrole

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
            $(".js-example-basic-multiple").select2({
              placeholder: "Choose Subject",
              theme: 'bootstrap4',
            });

            $('#sub').hide();

            
            $('#inputLogo').on('change', function(){ //on file input change

                if (window.File,window.FileReader,window.FileList,window.Blob) //check File API supported browser
                {
           
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            console.log(fRead);
                            fRead.onload = (function(file){ //trigger function on successful read
                                console.log(file);
                                $('#preview_img').empty();
                                return function(e) {

                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width('100').height('100'); //create image element 
                                    //$("#preview_img").empty().append(img);
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }else{
                            $('#preview_img').val('');
                        }
                    });
               
                }
                else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });

             $('#topicName').change(function(){
                var topic = $(this).children("option:selected").data('name');
                if(topic == 'Live Recording'){
                    $('#other').hide();
                    $('#sub').show();
                }else{
                     $('#other').show();
                     $('#sub').hide();
                }
             })

        });

    </script>
@endsection
