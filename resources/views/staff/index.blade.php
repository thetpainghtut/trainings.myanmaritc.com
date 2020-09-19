@extends('backendtemplate')

@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> 
        All Staffs 

        <a href="{{route('staffs.create')}}" class="btn btn-outline-primary float-right btn-sm">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </a>   

    </h1> 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist">
                    @foreach($roles as $role)
                        <a class="nav-item nav-link nav_class <?php if($role->name=='Mentor'){?> active <?php }; ?> my-auto" data-toggle="tab" href=".{{$role->name}}" role="tab" aria-controls="nav-home" data-name="{{$role->name}}" aria-selected="true"     <?php if($role->name=="Admin"){?> style="display: none;" <?php }; ?> > {{$role->name}}</a>
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
                                <th>Email</th>
                                <th>NRC</th>
                                <th>DOB</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                     
                            @php $i = 1; @endphp
                      
                            @foreach($user as $staff_user)
                                @if($staff_user->staff)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$staff_user->name}} </td>
                                        <td> {{$staff_user->email}} </td>
                                        <td> {{$staff_user->staff->nrc}} </td>
                                        <td> {{$staff_user->staff->dob}} </td>
                                        <td>
                                            <a href="{{route('staffs.show',$staff_user->id)}}" class='btn btn-primary btn-sm'><i class="fas fa-info"></i>
                                            </a>

                                            {{-- <a href="{{route('staffs.edit',$staff_user->id)}}" class='btn btn-warning'><i class="fas fa-edit"></i></a>--}}
                                        
                                            <form method="post" action="{{route('status_change',$staff_user->staff->id)}}" class="d-inline-block">
                                            @csrf
                                      
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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
                var role_name = $(this).data('name');
                $.post('all_staff',{role_name:role_name},function(response){
                    // console.log(response);
                    var j =1;
                    var html="";
                    $.each(response,function(i,v){
                        if(v.staff){
                            html+=`<tr>
                                    <td>${j++}</td>
                                    <td>${v.name}</td>
                                    <td>${v.email}</td>
                                    <td>${v.staff.nrc}</td>
                                    <td>${v.staff.dob}</td>
                                    <td>

                                        <a href="{{route('staffs.show',':user_id')}}" class='btn btn-primary btn-sm'><i class="fas fa-info"></i>
                                        </a>
                                
                                        <form method="post" action="{{route('status_change',':id')}}" class="d-inline-block">
                                        
                                            @csrf
                                  
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>`;
                            html= html.replace(':id',v.staff.id);
                            html= html.replace(':user_id',v.id);
                            html= html.replace(':users_id',v.id);
                        }
                    });

                    $('tbody').html(html);
                });
            });

            $('tbody').on('click',function(){
                var id = $(this).data('id');
            });
        })
    </script>
@endsection