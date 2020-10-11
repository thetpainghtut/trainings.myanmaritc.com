@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Courses </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Courses
                <a href="{{route('courses.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Code No</th>
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
                                <td>{{$row->code_no}}</td>
                                <td>{{$row->name}} </td>
                                <td>{{$row->fees}}</td>
                                <td>{{$row->during}}</td>
                                <td>{{$row->duration}}</td>
                                <td>

                                    <a href="#" class="btn btn-primary course_detail btn-sm" data-id="{{$row->id}}" data-name="{{$row->name}}" data-fees="{{$row->fees}}" data-during="{{$row->during}}" data-duration="{{$row->duration}}" data-image="{{$row->logo}}" data-code="{{$row->code_no}}" >
                                        <i class="fas fa-info"></i>
                                    </a>

                                    <a href="{{route('courses.edit',$row->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                 
                                    
                                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="alert('You cannot delete!!!!!')">
                                        <i class="fas fa-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
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
                    <h5 class="modal-title">Course Deatail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">

                            <div class="row mb-4">
                                <div class="col-md-8 offset-md-2">
                                    <img  class="img-fluid courses_image" width="200px" height="150px">
                                </div>
                            </div>
                  
                  
                            <div class="row">
                                <label class="col-sm-4">Code No:</label>
                                <div class="col-sm-8">
                                    <p class="courses_no"></p>
                                </div>
                            </div>

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
        var code = $(this).data('code');
        // console.log(logo);
        $('.courses_image').attr('src',logo);
        $('.courses_name').html(name);
        $('.courses_fees').html(fees);
        $('.courses_during').html(during);
        $('.courses_duration').html(duration);

        $('.courses_no').html(code);

        $('.detail_modal').modal('show');

      });

    })
  </script>
@endsection