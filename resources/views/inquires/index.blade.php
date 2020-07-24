@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Inquires List</h2>
  <a href="{{route('inquires.create')}}" class="btn btn-info float-right">Add New</a>

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inquire</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Fisrt installment</a>
      
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Inquire No</th>
            <th>Education</th>
            <th>Township</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($no_payment_inquires as $no_payment)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$no_payment->name}}</td>
            <td>{{$no_payment->phone}}</td>
            <td>{{$no_payment->inquireno}}</td>
            <td>{{$no_payment->education->name}}</td>
            <td>{{$no_payment->township->name}}</td>
            <td>
                <a href="#" class="btn btn-primary inquire_detail" data-name="{{$no_payment->name}}" data-inquireno="{{$no_payment->inquireno}}" data-receiveno="{{$no_payment->receiveno}}" data-gender="{{$no_payment->gender}}"  data-phone="{{$no_payment->phone}}" data-installmentdate="{{$no_payment->installmentdate}}" data-installmentamount="{{$no_payment->installmentamount}}" data-knowledge="{{$no_payment->knowledge}}" data-camp="{{$no_payment->camp}}" data-education="{{$no_payment->education->name}}" data-acceptedyear="{{$no_payment->acceptedyear}}" data-batch="{{$no_payment->batch->title}}" data-township="{{$no_payment->township->name}}"><i class="fas fa-info"></i>
                </a>

              <div class="btn-group">
                <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu">
                  @if($no_payment->status == 0)
                  <a class="dropdown-item edit_install" href="#" data-id="{{$no_payment->id}}">First Installment</a>
                  @else
                  <a href="#" class="dropdown-item">Payed Preinstallment</a>
                  @endif
                  
                  @if($no_payment->status == 1 || $no_payment->status == 0)
                  <a class="dropdown-item full_install" href="#" data-id="{{$no_payment->id}}" data-fees="{{$no_payment->batch->course->fees}}" data-amount="{{$no_payment->installmentamount}}" data-batchid="{{$no_payment->batch_id}}">Print</a>
                  @else
                  <a href="#" class="dropdown-item">Confirm</a>
                  @endif
                </div>
              </div>
              <form method="post" action="{{route('inquires.destroy',$no_payment->id)}}" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>

              </form>
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Inquire No</th>
            <th>Education</th>
            <th>Townshio</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach($first_payment_inquires as $first_payment)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$first_payment->name}}</td>
            <td>{{$first_payment->phone}}</td>
            <td>{{$first_payment->inquireno}}</td>
            <td>{{$first_payment->education->name}}</td>
            <td>{{$first_payment->township->name}}</td>
            <td>
                <a href="#" class="btn btn-primary inquire_detail" data-name="{{$first_payment->name}}" data-inquireno="{{$first_payment->inquireno}}" data-receiveno="{{$first_payment->receiveno}}" data-gender="{{$first_payment->gender}}"  data-phone="{{$first_payment->phone}}" data-installmentdate="{{$first_payment->installmentdate}}" data-installmentamount="{{$first_payment->installmentamount}}" data-knowledge="{{$first_payment->knowledge}}" data-camp="{{$first_payment->camp}}" data-education="{{$first_payment->education->name}}" data-acceptedyear="{{$first_payment->acceptedyear}}" data-batch="{{$first_payment->batch->title}}" data-township="{{$first_payment->township->name}}"><i class="fas fa-info"></i>
                </a>

              <div class="btn-group">
                <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu">
                  @if($first_payment->status == 0)
                  <a class="dropdown-item edit_install" href="#" data-id="{{$first_payment->id}}">First Installment</a>
                  @else
                  <a href="#" class="dropdown-item">Payed Preinstallment</a>
                  @endif
                  
                  @if($first_payment->status == 1 || $first_payment->status == 0)
                  <a class="dropdown-item full_install" href="#" data-id="{{$first_payment->id}}" data-fees="{{$first_payment->batch->course->fees}}" data-amount="{{$first_payment->installmentamount}}" data-batchid="{{$first_payment->batch_id}}">Print</a>
                  @else
                  <a href="#" class="dropdown-item">Confirm</a>
                  @endif
                </div>
              </div>
              <form method="post" action="{{route('inquires.destroy',$first_payment->id)}}" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>

              </form>
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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

          <div class="row">
            <label class="col-md-5 offset-md-1">Township:</label>
            <div class="col-md-6">
              <p class="inquire_township"></p>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

  <div class="modal install_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Installment </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="First_Installment">
          @csrf
          <input type="hidden" name="id" id="install_id">
          <div class="modal-body">
            <div class="row my-3">
                <label class="col-md-4 offset-md-1" for="installment_date">Installment Date</label>
                <div class="col-md-7" id="form-group-installment_date">
                  <input type="date" class="form-control" id="installment_date" name="installment_date" >
                    <span class="text-danger show-error"></span>
                </div>
            </div>

            <div class="row">
                <label class="col-md-4 offset-md-1" for="installment_amount">Installment Amount</label>
                <div class="col-md-7" id="form-group-installment_amount">
                  <input type="number" class="form-control" id="installment_amount" name="installment_amount">
                    <span class="text-danger show-error"></span>
                </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Save</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fullinstall_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Full Payment </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('fullinstallment.store')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="fullinstall_id">
          <input type="hidden" name="batch_id" id="batch_id">
          <div class="modal-body">
            @php
            $date = date('Y/m/d');
            @endphp
           
            <div class="row my-3">
              <label class="col-md-4 offset-md-1" for="installment">Payment Date</label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="installment" name="installment_date" value="{{$date}}" readonly="readonly">
              </div>
            </div>

            <div class="row">
              <label class="col-md-4 offset-md-1" for="full_amount">Payment Amounts</label>
              <div class="col-md-7">
                <input type="number" class="form-control" id="full_amount" name="amount" readonly="readonly">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">OK</button>
            
          </div>
        </form>
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
      var township = $(this).data('township');
      console.log(education,batch,township);
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
      $('.inquire_township').text(township);
      $('.detail_modal').modal('show');
    })

    $('#First_Installment').submit(function(event){
      event.preventDefault();
      var install_data = new FormData(this);

      $.ajax({
        url:"{{route('installment.store')}}",
        data:install_data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data){
          if(data){
            $('.install_modal').modal('hide');
          }
        },
       error: function(error) {
        if(error.status == 422){
          var errors = error.responseJSON;
          var data = errors.errors;
        
          $.each(data,function(i,v){
            showValidationErrors(i,v);
          })
          $('.install_modal').modal('show');
        }
          
        }
      })
    })
    $('.edit_install').click(function(){
      var id = $(this).data('id');
      $('#install_id').val(id);
      
      $('.install_modal').modal('show');
    })
    $('.full_install').click(function(){
      var id = $(this).data('id');
      var fees = $(this).data('fees');
      var install_amount = $(this).data('amount');
      var batch_id = $(this).data('batchid');

      console.log(id,fees,install_amount,batch_id);
      var need_amoumt = fees - install_amount;
      console.log(need_amoumt);
      
      $('#fullinstall_id').val(id);
      $('#full_amount').val(need_amoumt);
      $('#batch_id').val(batch_id);
      $('.fullinstall_modal').modal('show');
    })
  })
 </script>
@endsection