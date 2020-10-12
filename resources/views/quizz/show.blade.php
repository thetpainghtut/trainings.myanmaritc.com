@extends('backendtemplate')

@section('content')

<div class="row">
    <div class="col-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Quizz </li>
            </ol>
        </nav>
    </div>
    <div class="col-2 mt-2">
         
        <button class="btn btn-outline-primary btn-sm float-right add_new" data-id="{{$subject->id}}" data-course_id = "{{$course->id}}" > <i class="fas fa-plus mr-2"></i>Add Title </button>
          
    </div>
</div> 


<div class="card shadow mx-auto mt-4">
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary"> {{$course->name}} ( {{$subject->name}} )</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    
                    <th>Questions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach($subject->quizzes as $quizz)
                <tr>

                    <td>{{$i}}</td>
                    <td>{{$quizz->title}}</td>
                    
                    <td>
                        @php
                            $count = count($quizz->questions);
                        @endphp
                        {{$count}}
                    </td>
                    <td>
                        <a href="{{route('questions.show',$quizz->id)}}" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-info"></i>
                        </a>

                        <button type="button" class="btn btn-outline-warning btn-sm edit_btn" data-id='{{$quizz->id}}' data-title='{{$quizz->title}}' data-photo='{{$quizz->photo}}' data-course_id = "{{$course->id}}" data-subject_id='{{$subject->id}}'>
                            <i class="fas fa-edit"></i>
                        </button>


                    </td>

                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- add title --}}
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Question Title </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <form id="storequizz">
                @csrf
                    <input type="hidden" name="subject_id" class="subject_id">
                    <input type="hidden" name="course_id" class="course_id">
                    
                    <div class="modal-body">
                        
                        <div class="row form-group" id="form-group-title">
                           <label class="form-control-label col-2" for="title">Title</label>
                           <div class="col-10">
                               <input type="text" name="title" class="form-control" id="title">
                                <span class="show-error text-danger"></span>

                           </div>
                        </div>

                        <div class="row form-group">
                           <label class="form-control-label col-2" id="title">Photo</label>
                           <div class="col-10">
                               <input type="file" name="photo" class="form-control-file input_photo">
                               <img src="" class="show_photo mt-2">

                           </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>

{{-- edit quizz --}}
<div class="modal" id="editquizz" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Question Title </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <form id="updatequizz">
                @csrf
                @method('PUT')
                    <input type="hidden" name="subject_id" class="subject_id">
                    <input type="hidden" name="course_id" class="course_id">

                    <input type="hidden" name="oldphoto" class="oldphotovalue">
                    <input type="hidden" name="id" class="edit_id">


                    
                    <div class="modal-body">
                        
                        <div class="row form-group" id="form-title">
                           <label class="form-control-label col-2" for="edittitle">Title</label>
                           <div class="col-10">

                               <input type="text" name="title" class="form-control edit_title" id="edittitle">
                                <span class="show-error text-danger"></span>

                           </div>
                        </div>

                        <div class="row form-group">
                           <label class="form-control-label col-2">Photo</label>
                           <div class="col-10">
                            <nav>
                                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                                    
                                  </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <img src="" class="oldphoto mt-2">
                                  </div>
                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      
                                    <input type="file" name="newphoto" class="form-control-file input_photo mt-2">
                                    <img src="" class="show_photo mt-2">
                                  </div>
                                  
                                </div>


                           </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        function showValidationErrors(name,error){
            var group = $("#form-group-"+name);
            group.addClass('has-error');
            group.find('.show-error').text(error);
        }

        function clearValidationError(name) {
            console.log(name);
            var group = $("#form-group-" + name);
            group.removeClass('has-error');
            group.find('.show-error').text('');
        }
        $('#title').on('keyup',function() {
            clearValidationError($(this).attr('id').replace('#', ''))
        });

        $('#edittitle').on('keyup',function() {
            clearValidationError($(this).attr('id').replace('#', ''))
        });


        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.input_photo').change(function(){

        readURL(this);
        function readURL(input)
        {
            if(window.File,window.FileReader,window.Filelist,window.Blob){
                    var input_image = input.files;
                    var reader = new FileReader();
                    reader.onload=function(e){
                        $('.show_photo').attr('src',e.target.result).width('120px').height('100px');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        })

       $('.add_new').click(function(){
        var subject = $(this).data('id');
        var course_id = $(this).data('course_id');
        $('.subject_id').val(subject);
        $('.course_id').val(course_id);
        $('#exampleModal').modal('show');
       })

       $('#storequizz').submit(function(event){
            event.preventDefault();
            var formdata = new FormData(this);
            console.log(formdata);
            $.ajax({
                url : '{{route("quizzes.store")}}',
                type : 'post',
                enctype: 'multipart/form-data',
                data : formdata,
                processData: false,
                contentType: false,

                success:function(data) {
                    if(data){
                        $('#editquizz').modal('hide');
                        $('.course_id').val(data.id);
                        
                        location.reload();
                    }
                },
                error:function (error) {
                   if(error.status == 422){
                    var errors = error.responseJSON;
                    var data = errors.errors;
                    $.each(data,function(i,v){
                        showValidationErrors(i,v);
                    });
                    $('#editquizz').modal('show');

                   }
                }



            })
         });



       $('.edit_btn').click(function(){
        var id = $(this).data('id');
        var title = $(this).data('title');
        var photo = $(this).data('photo');
        var subject_id = $(this).data('subject_id');

        $('#editquizz').modal('show');
        $('.edit_id').val(id);
        $('.edit_title').val(title);
        $('.oldphotovalue').val(photo);
        $('.oldphoto').attr('src',photo).width('120px').height('100px');
        $('.subject_id').val(subject_id);

       })


       $('#updatequizz').submit(function(event){
            var id = $('.edit_id').val();
            var url = "{{route("quizzes.update",":id")}}";
            url = url.replace(':id',id);
            event.preventDefault();
            var formdata = new FormData(this);
            console.log(formdata);
            $.ajax({
                url : url,
                type : 'POST',
                enctype: 'multipart/form-data',
                data : formdata,
                processData: false,
                contentType: false,

                success:function(data) {
                    if(data){
                        $('#editmodal').modal('hide');
                        location.reload();
                    }
                },
                error:function (error) {
                   if(error.status == 422){
                    var errors = error.responseJSON;
                    var data = errors.errors;
                    $.each(data,function(i,v){
                        showValidationErrors(i,v);
                    });
                    $('#editmodal').modal('show');

                   }
                }



            })
         })
    })
</script>
@endsection