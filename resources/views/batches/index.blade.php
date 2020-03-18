@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Batches</h2>
  <a href="{{route('batches.create')}}" class="btn btn-info float-right"> <i class="fas fa-plus"></i>Add New</a>

  <table class="table">
    <thead>
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
      @php
        $i = 1;
      @endphp
      @foreach($batches as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->title}}</td>
        <td>{{$row->startdate}}</td>
        <td>{{$row->enddate}}</td>
        <td>{{$row->course->name}} ( {{$row->course->location->city->name}} )</td>
        <td>

          <a href="{{route('batches.show',$row->id)}}" class="btn btn-primary batch_detail" data-id='{{$row->id}}' data-startdate='{{$row->startdate}}' data-enddate='{{$row->enddate}}' data-course='{{$row->course->name}}' data-fees='{{$row->course->fees}}'data-duration='{{$row->course->duration}}' data-course='{{$row->course->name}}' data-outline='{{$row->course->outline}}' >


            <i class="fas fa-info"></i></a>


          <a href="{{route('batches.edit',$row->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
          
         
            <button type="submit" class="btn btn-danger" onclick="alert('You cannot delete!!!!!')">
              <i class="fas fa-trash"></i>
            </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
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