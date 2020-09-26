@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> 
        All Subjects 

        <a href="{{route('subjects.create')}}" class="btn btn-outline-primary float-right btn-sm">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </a>   

    </h1> 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist">
                    @foreach($courses as $course)
                        <a class="nav-item nav-link nav_class <?php if($course->code_no=='0001'){?> active <?php }; ?> my-auto" data-toggle="tab" href=".{{$course->id}}" role="tab" aria-controls="nav-home" data-courseid="{{$course->id}}" aria-selected="true"> 
                            {{$course->name}}
                        </a>
                    @endforeach
              </div>
            </nav>
        </div>
        <div class="card-body">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($subjects as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td> 
                                    <div class="d-flex no-block align-items-center">
                                        <div class="mr-3">
                                            <img src="{{ asset($row->logo) }}"
                                                alt="logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" />
                                        </div>
                                        <div class="">
                                            <p class="text-dark mb-0 font-16 font-weight-medium"> {{ $row->name }} </p>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <a href="{{route('subjects.edit',$row->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                 
                                    <form method="post" action="{{route('subjects.destroy',$row->id)}}" class="d-inline-block">
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

            $('.nav_class').click(function(){
                $('nav').addClass('active');
                var course_id = $(this).data('courseid');
                $.post('subject_course',{course_id:course_id},function(response){
                    console.log(response);
                    var j =1;
                    var html="";
                    $.each(response,function(i,v){
                        console.log(v.id);
                        var subject_id = v.id;

                        var edit_routeURL = "{{ route('subjects.edit',':e_id') }}";
                        edit_routeURL = edit_routeURL.replace(':e_id',subject_id);

                        var delete_routeURL = "{{ route('subjects.destroy',':d_id') }}";
                        delete_routeURL = delete_routeURL.replace(':d_id',subject_id);

                        if(v){
                            html+=`<tr>
                                    <td>${j++}</td>
                                    <td>

                                        <div class="d-flex no-block align-items-center">
                                            <div class="mr-3">
                                                <img src="${v.logo}"
                                                    alt="user" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" />
                                            </div>
                                            <div class="">
                                                <p class="text-dark mb-0 font-16 font-weight-medium"> ${v.name} </p>
                                            </div>
                                        </div>

                                    </td>
                                    <td>

                                        <a href="`+edit_routeURL+`" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                     
                                        <form method="post" action="`+delete_routeURL+`" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>`;
                            // html= html.replace(':id',v.id);
                            // html= html.replace(':subject_id',v.id);
                        }
                    });

                    $('tbody').html(html);
                });
            });
        })
    </script>
@endsection