@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">All Staffs</h2>
  <a href="{{route('staffs.create')}}" class="btn btn-info float-right">
    <i class="fas fa-plus"></i>
  Add New</a>


    <nav>
      <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
        @foreach($roles as $role)
        <a class="nav-item nav-link nav_class <?php if($role->name=='Mentor'){?> active <?php }; ?>" data-toggle="tab" href=".{{$role->name}}" role="tab" aria-controls="nav-home" data-name="{{$role->name}}" aria-selected="true" <?php if($role->name=="Admin"){?> style="display: none;" <?php }; ?> > {{$role->name}}</a>
        @endforeach
      </div>
    </nav>
   
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-home-tab">
        
          <table class="table">
            <thead>
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
              
               @php
                  $i = 1;
                @endphp

              @foreach($user as $staff_user)
                <tr>
                  <td> {{$i++}} </td>
                  <td> {{$staff_user->name}} </td>
                  <td> {{$staff_user->email}} </td>
                  <td> {{$staff_user->staff->nrc}} </td>
                  <td> {{$staff_user->staff->dob}} </td>
                  <td>
                    <button class="btn btn-info"><i class="fas fa-info"></i></button>
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
              @endforeach


            </tbody>

          </table>

          <nav>

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
          console.log(response);
          var j =1;
          var html="";
          $.each(response,function(i,v){
            html+=`<tr>
                  <td>${j++}</td>
                  <td>${v.name}</td>
                  <td>${v.email}</td>
                  <td>${v.staff.nrc}</td>
                  <td>${v.staff.dob}</td>
                  <td>
                    <button class="btn btn-info"><i class="fas fa-info"></i></button>
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </td>
                  </tr>`;
          });

          $('tbody').html(html);
        });
      })
    })
  </script>
@endsection