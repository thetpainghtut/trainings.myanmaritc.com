@extends('backendtemplate')

@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@endif
@if(session()->get('danger'))
  <div class="alert alert-danger">
    {{ session()->get('danger') }}
  </div>
@endif
    <h1 class="h3 mb-4 text-gray-800"> Project Types </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Project Types
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Project Name</th>
                            <th>User Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @foreach($projecttypes as $projtype)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$projtype->name}}</td>
                            <td>{{$projtype->user->name}}</td>
                            
                            <td>
                                <a href="#" class="btn btn-info asign"  data-id="{{$projtype->id}}" data-course="{{$userid}}">Assign</a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<div class="modal" tabindex="-1" id="assignprojectmodal">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Project Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('projecttypes.store')}}" method="post">
        @csrf
        <input type="hidden" name="projecttype" id="ptypehidden">
      <div class="modal-body">
        
        <div class="form-group row">
            <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
            
            <div class="col-sm-10">
                <select class="form-control batchName" name="batch" id="batchName">
                    
                </select>
            </div>
           
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
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
        $('.asign').on('click',function(){
            var pid = $(this).data('id');
            
            var userid = $(this).data('course');
            $.post('/assingpttype',{pid:pid,userid:userid},function(response){
               // console.log(response.batches.length);
               
                if(response.batches.length > 0){
                     var html='';
                     html+=`<option selected disabled>Choose One</option>`;
                $.each(response.batches,function(i,v){
                    console.log(v);
                    html+=('<option value="'+v.id+'">'+v.title+'</option>');
                })

               $('.batchName').html(html);
               $('#ptypehidden').val(pid);
                $('#assignprojectmodal').modal('show');
                
                }
            })
        })
    })
</script>
@endsection