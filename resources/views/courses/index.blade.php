@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Courses</h2>
  <a href="{{route('courses.create')}}" class="btn btn-info float-right"> <i class="fas fa-plus"></i>Add New</a>

  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fees</th>
        <th>During</th>
        <th>Duration</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i = 1;
      @endphp
      @foreach($courses as $row)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->fees}}</td>
        <td>{{$row->during}}</td>
        <td>{{$row->duration}}</td>
        <td>

          <a href="#" class="btn btn-primary course_detail" data-id="{{$row->id}}" data-name="{{$row->name}}" data-fees="{{$row->fees}}" data-during="{{$row->during}}" data-duration="{{$row->duration}}" data-image="{{$row->logo}}">
            <i class="fas fa-info"></i>
          </a>

          <a href="{{route('courses.edit',$row->id)}}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
          </a>
         
          <form method="post" action="{{route('courses.destroy',$row->id)}}" class="d-inline-block">
            @csrf
            @method('DELETE')
            @if($row->trashed())
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash-restore"></i>
              </button>
            @else
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            @endif
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
          <h5 class="modal-title">Course Deatail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <img  class="img-fluid courses_image" width="120px" height="80px">
            </div>
            <div class="col-md-8">
              

              <div class="row">
                  <label class="col-sm-4">Name:</label>
                <div class="col-sm-8">
                   <p class="courses_name"></p>
                </div>
              </div>

              <div class="row">
                  <label class="col-sm-4">Fees:</label>
                <div class="col-sm-8">
                   <p class="courses_fees"></p>
                </div>
              </div>


              <div class="row">
                  <label class="col-sm-4">During:</label>
                <div class="col-sm-8">
                   <p class="courses_during"></p>
                </div>
              </div>


              <div class="row">
                  <label class="col-sm-4">Duration:</label>
                <div class="col-sm-8">
                   <p class="courses_duration"></p>
                </div>
              </div>

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

    $(document).ready(function(){

      $('.course_detail').click(function(){
        var name = $(this).data('name');
        var fees = $(this).data('fees');
        var during = $(this).data('during');
        var duration = $(this).data('duration');
        var logo = $(this).data('image');
        // console.log(logo);
        $('.courses_image').attr('src',logo);
        $('.courses_name').html(name);
        $('.courses_fees').html(fees);
        $('.courses_during').html(during);
        $('.courses_duration').html(duration);

        $('.detail_modal').modal('show');

      });

    })
  </script>
@endsection