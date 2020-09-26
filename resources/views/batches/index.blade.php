@extends('backendtemplate')

@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Batches </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Batches
                <a href="{{route('batches.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($batches as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->title}} ({{ $row->type }}) </td>
                                <td>{{$row->startdate}}</td>
                                <td>{{$row->enddate}}</td>
                                <td>{{$row->course->name}} ( {{$row->location->city->name}} )</td>
                                <td>

                                    <a href="{{route('batches.show',$row->id)}}" class="btn btn-primary batch_detail btn-sm" data-id='{{$row->id}}' data-startdate='{{$row->startdate}}' data-enddate='{{$row->enddate}}' data-course='{{$row->course->name}}' data-fees='{{$row->course->fees}}'data-duration='{{$row->course->duration}}' data-course='{{$row->course->name}}' data-outline='{{$row->course->outline}}' >
                                        <i class="fas fa-info"></i>
                                    </a>

                                    <a href="{{route('batches.edit',$row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                              
                             
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="alert('You cannot delete!!!!!')">
                                        <i class="fas fa-trash"></i>
                                    </button>
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