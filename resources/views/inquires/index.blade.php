@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Inquires</h2>
  <a href="{{route('inquires.create')}}" class="btn btn-info float-right">Add New</a>

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
      @foreach($inquires as $inquire)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$inquire->name}}</td>
        <td>{{$inquire->phone}}</td>
        <td>{{$inquire->inquireno}}</td>
        <td>{{$inquire->education->name}}</td>
        <td>{{$inquire->township->name}}</td>
        <td>
            <a href="#" class="btn btn-primary inquire_detail" data-name="{{$inquire->name}}" data-inquireno="{{$inquire->inquireno}}" data-receiveno="{{$inquire->receiveno}}" data-gender="{{$inquire->gender}}"  data-phone="{{$inquire->phone}}" data-installmentdate="{{$inquire->installmentdate}}" data-installmentamount="{{$inquire->installmentamount}}" data-knowledge="{{$inquire->knowledge}}" data-camp="{{$inquire->camp}}" data-education="{{$inquire->education->name}}" data-acceptedyear="{{$inquire->acceptedyear}}" data-batch="{{$inquire->batch->title}}" data-township="{{$inquire->township->name}}"><i class="fas fa-info"></i>
            </a>

          <div class="btn-group">
            <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </a>
            <div class="dropdown-menu">
              @if($inquire->status == 0)
              <a class="dropdown-item edit_install" href="#" data-id="{{$inquire->id}}">First Installment</a>
              @else
              <a href="#" class="dropdown-item">Payed Preinstallment</a>
              @endif
              
              @if($inquire->status == 1 || $inquire->status == 0)
              <a class="dropdown-item full_install" href="#" data-id="{{$inquire->id}}" data-fees="{{$inquire->batch->course->fees}}" data-amount="{{$inquire->installmentamount}}" data-batchid="{{$inquire->batch_id}}">Print</a>
              @else
              <a href="#" class="dropdown-item">Confirm</a>
              @endif
            </div>
          </div>
          <form method="post" action="{{route('inquires.destroy',$inquire->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>

          </form>
          
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

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
        <form action="{{route('installment.store')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="install_id">
          <div class="modal-body">
            <div class="row my-3">
              <label class="col-md-4 offset-md-1" for="installment">Installment Date</label>
              <div class="col-md-7">
                <input type="date" class="form-control" id="installment" name="installment_date">
              </div>
            </div>

            <div class="row">
              <label class="col-md-4 offset-md-1" for="amount">Installment Amount</label>
              <div class="col-md-7">
                <input type="number" class="form-control" id="amount" name="installment_amount">
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
          <h5 class="modal-title">Full Installment </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('fullinstallment.store')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="fullinstall_id">
          <input type="hidden" name="batch_id" id="batch_id">
          <div class="modal-body">
            <div class="row my-3">
              <label class="col-md-4 offset-md-1" for="installment">Installment Date</label>
              <div class="col-md-7">
                <input type="date" class="form-control" id="installment" name="installment_date">
              </div>
            </div>

            <div class="row">
              <label class="col-md-4 offset-md-1" for="full_amount">Installment Amount</label>
              <div class="col-md-7">
                <input type="number" class="form-control" id="full_amount" name="amount" readonly="readonly">
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

@endsection

@section('script')
 <script type="text/javascript">
  $(document).ready(function () {
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