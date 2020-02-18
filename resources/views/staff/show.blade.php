@extends('backendtemplate')

@section('content')
 
 <div class="row mb-3">
  <div class="col-md-10 offset-1">
   <a href="{{route('dashboard')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angledrawback"></i> Go Back</a>
         @if($errors->has('password'))
              <span class="text-danger">{{$errors->first('password')}}</span>
          @elseif(session('message'))
               <alert class="alert alert-success msg">{{session('message')}}</alert>
          @endif
  </div>
 </div>
<div class="card col-md-10 offset-1 shadow">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">


        <div class="row">

          <div class="col-md-4 offset-1">
            <img src="{{$user->staff->photo}}" class="img-fluid " width="250px" height="300px">

            <div class="row mt-4">
              <div class="col-md-12">
                <a href="{{route('staffs.edit',Auth::user()->id)}}" class="btn btn-outline-warning btn-block">Edit Profile</a>
                <button class="btn btn-outline-secondary btn-block" data-target="#changepassword" data-toggle="modal">Change Password</button>
                
              </div>
            </div>

          </div>

          <div class="col-md-6 offset-1">

            <div class="row mb-2">
             
              <div class="col-md-12">
                <h2>{{$user->name}}</h2>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-4">Role:</label>
              <div class="col-md-8">
                {{$role[0]}}
              </div>
            </div>

            

            <div class="row mt-2">
              <label class="col-sm-4">Email:</label>
              <div class="col-md-8">
                {{$user->email}}
              </div>
            </div>

             <div class="row mt-2">
              <label class="col-sm-4">DOB:</label>
              <div class="col-md-8">
                {{$user->staff->dob}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Phone:</label>
              <div class="col-md-8">
                {{$user->staff->phone}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">NRC:</label>
              <div class="col-md-8">
                {{$user->staff->nrc}}
              </div>
            </div>


            <div class="row mt-2">
              <label class="col-sm-4">Father Name:</label>
              <div class="col-md-8">
                {{$user->staff->fathername}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Join Date:</label>
              <div class="col-md-8">
                {{$user->staff->joineddate}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Location</label>
              <div class="col-md-8">
                {{$user->staff->location->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">City</label>
              <div class="col-md-8">
                {{$user->staff->location->city->name}}
              </div>
            </div>

            @if($role[0]=="Teacher")
             <div class="row mt-2">
              <label class="col-sm-4">Course:</label>
              <div class="col-md-8">
                  {{$user->staff->teacher->course->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Degree:</label>
              <div class="col-md-8">
                  {!! $user->staff->teacher->degree !!}
              </div>
            </div>

             @elseif($role[0]=="Mentor")
            <div class="row mt-2">
              <label class="col-sm-4">Course:</label>
              <div class="col-md-8">
                  {{$user->staff->mentor->course->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Degree:</label>
              <div class="col-md-8">
                  {!! $user->staff->mentor->degree !!}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Portfolios:</label>
              <div class="col-md-8">
                  {{$user->staff->mentor->portfolio}}
                  
              </div>
            </div>
            @endif


          </div>

        </div>

      </div>
    </div>
  </div>
</div>





<!-- change password modal -->

<div class="modal" tabindex="-1" role="dialog" id="changepassword">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('changepassword',Auth::user()->id)}}" method="post">
        @csrf
            <div class="modal-body">
            
              <div class="form-group row">
               
                <div class="col-sm-10 offset-1 input-group">
                  <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon1">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-light circle" onclick="showpassword()"><i class="fas fa-eye"></i></button>
                      
                  </div>
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
     function showpassword()
     {
       var password = document.getElementById('password');
      if(password.type=="password")
       {
           password.type="text";
       }
       else{
         password.type="password";
      }

    }

  $(document).ready(function(){
    $('.msg').hide(3000);
  })
</script>

@endsection
