@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inquires.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Postpone </li>
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
            <h5 class="m-0 font-weight-bold text-primary"> {{ $course->name }} Lesson
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Inquire No</th>
                            <th>Education</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($batches as $batch)
                            @foreach($batch->inquires as $batch_inquire)
                            @php
                            $inquire_message = $batch_inquire->message;
                            
                            @endphp
                            @if($inquire_message != null)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$batch_inquire->name}}</td>
                                <td>{{$batch_inquire->phone}}</td>
                                <td>{{$batch_inquire->inquireno}}</td>
                                <td>{{$batch_inquire->education->name}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary inquire_detail btn-sm" data-name="{{$batch_inquire->name}}" data-inquireno="{{$batch_inquire->inquireno}}" data-receiveno="{{$batch_inquire->receiveno}}" data-gender="{{$batch_inquire->gender}}"  data-phone="{{$batch_inquire->phone}}" data-installmentdate="{{$batch_inquire->installmentdate}}" data-installmentamount="{{$batch_inquire->installmentamount}}" data-knowledge="{{$batch_inquire->knowledge}}" data-camp="{{$batch_inquire->camp}}" data-education="{{$batch_inquire->education->name}}" data-acceptedyear="{{$batch_inquire->acceptedyear}}" data-batch="{{$batch_inquire->batch->title}}" ><i class="fas fa-info"></i>
                                    </a>

                                    <form method="post" action="{{route('inquires.destroy',$batch_inquire->id)}}" class="d-inline-block btn-sm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                    </form>
                                  
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   <div class="modal detail_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquire Deatail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-5 offset-md-1">Inquire NO:</label>
                        <div class="col-md-6">
                            <p class="inquire_no"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Receive No:</label>
                        <div class="col-md-6">
                            <p class="receive_no"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Name:</label>
                        <div class="col-md-6">
                            <p class="inquire_name"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Gender:</label>
                        <div class="col-md-6">
                            <p class="inquire_gender"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Phone:</label>
                        <div class="col-md-6">
                            <p class="inquire_phone"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Installment Date:</label>
                        <div class="col-md-6">
                            <p class="installment_date"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Installment Amount:</label>
                        <div class="col-md-6">
                            <p class="installment_amount"></p>
                        </div>
                    </div>
          
                    <div class="row">
                        <label class="col-md-5 offset-md-1">Knowledge:</label>
                        <div class="col-md-6">
                            <p class="knowledge"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Camp:</label>
                        <div class="col-md-6">
                            <p class="inquire_camp"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Education:</label>
                        <div class="col-md-6">
                            <p class="education"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Accepted year:</label>
                        <div class="col-md-6">
                            <p class="acceptedyear"></p>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-5 offset-md-1">Batch:</label>
                        <div class="col-md-6">
                            <p class="inquire_batch"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
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

            $("#installment_amount").on('keyup', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $("#postpone").on('keyup', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.inquire_detail').click(function(){
                var inquireno = $(this).data('inquireno');
                var receiveno = $(this).data('receiveno');
                var name = $(this).data('name');
                var gender = $(this).data('gender');
                var phone = $(this).data('phone');
                var installmentdate = $(this).data('installmentdate');
                var installmentamount = $(this).data('installmentamount');
                var knowledge = $(this).data('knowledge');
                var camp = $(this).data('camp');
                var education = $(this).data('education');
                var acceptedyear = $(this).data('acceptedyear');
                var batch = $(this).data('batch');
                
                $('.inquire_no').text(inquireno);
                $('.receive_no').text(receiveno);
                $('.inquire_name').text(name);
                $('.inquire_gender').text(gender);
                $('.inquire_phone').text(phone);
                $('.installment_date').text(installmentdate);
                $('.installment_amount').text(installmentamount);
                $('.knowledge').text(knowledge);
                $('.inquire_camp').text(camp);
                $('.education').text(education);
                $('.acceptedyear').text(acceptedyear);
                $('.inquire_batch').text(batch);
                $('.detail_modal').modal('show');
            })
           
        })
    </script>
@endsection
