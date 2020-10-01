@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {{ $subject->name }} </li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('lessons.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $subject->name }} Lesson
<<<<<<< HEAD
=======
               <button class="btn btn-outline-primary float-right assign_batch" >Assign</button>
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="dataTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th> Duration </th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($lessons as $lesson)
                        <tr>
                            <td>{{$i++}}</td>
                            <td> {{ $lesson->title }} </td>
                            <td> {{ gmdate("H:i:s", $lesson->duration )}} mins  </td>

                            <td>
                                <a href="{{route('lessons.show',$lesson->id)}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-info"></i>
                                </a>

                                <a href="{{route('lessons.edit',$lesson->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                             
                                <form method="post" action="{{route('lessons.destroy',$lesson->id)}}" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<<<<<<< HEAD

@endsection
=======
   

<!-- Modal -->
<div class="modal fade" id="assign_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Batch and Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="assign_batch_subject">
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                <div class="modal-body">
                    <div class="row my-3">
                        <div class="col-md-10 offset-1" id="form-group-batch">
                            <label for="postpone">Batch</label>
                       
                            <select class="form-group form-control js-example-basic-single" name="batch">
                                @foreach($batches as $batch)
                                <option value="{{$batch->id}}">{{$batch->title}}</option>
                                @endforeach
                            </select>
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

            function showValidationErrors(name, error) {
                var group = $("#form-group-" + name);
                group.addClass('has-error');
                group.find('.show-error').text(error);
            }

            function clearValidationError(name) {
                console.log(name);
                var group = $("#form-group-" + name);
                group.removeClass('has-error');
                group.find('.show-error').text('');
            }

            $("#installment_date").on('change', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $('.assign_batch').click(function(){
                $('#assign_modal').modal('show');
            })

            $('#assign_batch_subject').submit(function(event){
                event.preventDefault();
                var assign_data = new FormData(this);

                $.ajax({
                    url:"{{route('assign_batchsubject')}}",
                    data:assign_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                        if(data){
                            $('#assign_modal').modal('hide');
                            // location.reload();
                        }
                    },
                    error: function(error) {
                        if(error.status == 422){
                            var errors = error.responseJSON;
                            var data = errors.errors;
                
                            $.each(data,function(i,v){
                                showValidationErrors(i,v);
                            })
                            $('#assign_modal').modal('show');
                        }
              
                    }
                })
            })
        })
    </script>
@endsection
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
