@extends('backendtemplate')

@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Topics </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Topics
                <a href="{{route('topics.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($topics as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td>

                                    <a href="{{route('topics.edit',$row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                              
                             
                                    <form method="post" action="{{route('topics.destroy',$row->id)}}" class="d-inline-block">
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

@endsection

@section('script')
  <!-- <script type="text/javascript">
    $(document).ready(function(){


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

      $('.batch_detail').click(function(){
        var id = $(this).data('id');
        $.post('show_batch',{id,id},function(res)
        {
          $.each(res.teachers,function(i,v){
            console.log(v);
          })
        })
      })
      
    })
  </script> -->
@endsection