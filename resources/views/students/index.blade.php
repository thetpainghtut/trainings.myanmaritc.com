@extends('backendtemplate')
@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Students </h1>
    @if(session('msg'))
        <h6 class="text-success">{{session('msg')}}</h6>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Students 
                <a href="{{route('students.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">

            <form method="get" action="{{route('students.index')}}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Course:</label>
                        <select name="course" class="form-control" id="course">
                            <option> Choose Course </option>
                            @foreach($courses as $row)
                                <option value="{{$row->id}}">{{$row->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Batch:</label>
                        <select name="batch" class="form-control" disabled="disabled" id="batch">
                            <option> Choose Batch </option>
                            {{-- @foreach($batches as $row)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form-group col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
              
                    @if($bid !=0)
                        <div class="form-group col-md-2 text-right mt-2">
                            <a name="btnSelect" href="{{route('export',$bid)}}" role="button" class="btn btn-info mt-4"><i class="far fa-file-excel"></i> Print Attendance </a>
                        </div>
                    @endif
                </div>
            </form>

            @isset($batch)
                {{-- @if(count($batch) > 0) --}}
                <table class="table table-bordered my-3">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Batch</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($groups as $group)
                            <tr>
                                <td colspan="6" class="bg-dark text-white">{{$group->name}} Group</td>
                            </tr> --}}
                            @php 
                                $i = 1; 
                                $course_id = $_REQUEST['course'];
                                $batch_id  = $_REQUEST['batch'];
                            @endphp


                            @foreach($batch->students as $row)
                            @if($row->pivot->status=='Active')
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->namee}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$batch->course->name}} - {{$batch->title}}</td>
                                    <td>
                                        <a href="{{route('students.show',$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>
                                        
                                        <a href="{{route('students.edit',$row->id)}}?course={{$course_id}}&batch={{$batch_id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                               
                                        
                                            <button type="submit" class="btn btn-danger btn-sm delete" data-student_id = "{{$row->id}}" data-batch_id = "{{$batch->id}}"
                                            data-receive_no = "{{$row->pivot->receiveno}}"><i class="fas fa-trash"></i></button>
                                            {{-- @endif --}}
                                        

                                            <button type="submit" class="btn btn-success send_mail btn-sm" data-student_id = "{{$row->id}}"><i class="fas fa-envelope"></i></button>

                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        {{-- @endforeach --}}
                    </tbody>
                </table>
                {{-- @else
                    <h2 class="my-3">Please, Create Group!!!</h2> --}}
                {{-- @endif --}}
            @endif
        </div>
    </div>


{{-- delete modal --}}
     <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leave Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <form id="student_leave">
                    @csrf
                        <input type="hidden" name="student_id" class="student_id">
                        <input type="hidden" name="batch_id" class="batch_id">
                        <input type="hidden" name="receive_no" class="receive_no">

                        <div class="modal-body">
                
                            <div class="row my-3">
                                <div class="col-md-10 offset-1" id="form-group-status">
                                    <label for="reason">Reason</label>
                               
                                    <textarea type="text" class="form-control"  name="status" id="status"></textarea>
                                    <span class="text-danger show-error"></span>
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
    
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

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
        $('#status').on('keyup',function() {
            clearValidationError($(this).attr('id').replace('#', ''))
        })

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

         $('.send_mail').click(function() {
             var student_id = $(this).data('student_id');
             // alert(student_id);
             $.post('resend_mail',{student_id:student_id},function(res){
                var html = '';
                if(res=='ok'){
                    alert('Success to resend mail!!');
                    
                }else{
                    alert('Failed to resend mail!!');
                    
                }
             })
         })

         $('.delete').click(function(){
            var student_id = $(this).data('student_id');
            var batch_id = $(this).data('batch_id');
            var receive_no = $(this).data('receive_no');

            $('.student_id').val(student_id);
            $('.batch_id').val(batch_id);
            $('.receive_no').val(receive_no);


            $('#exampleModal').modal('show');
         })

         $('#student_leave').submit(function(event) {
             event.preventDefault();
             var student_data = new FormData(this);
             $.ajax({
                url : '{{route("student_status_change")}}',
                type : 'post',
                data : student_data,
                processData: false,
                contentType: false,

                success:function(data) {
                    if(data){
                        $('#exampleModal').modal('hide');
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
                    $('#exampleModal').modal('show');

                   }
                }



             })
         })
      });
  </script>
@endsection









