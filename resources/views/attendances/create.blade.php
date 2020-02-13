@extends('backendtemplate')
@section('content')
<h2 class="d-inline-block">All Student List</h2>

  <form method="get" action="{{route('attendances.index')}}">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCourse">Choose Course:</label>
        <select name="course" class="form-control" id="course">
          <option disabled selected="">Please Select Course</option>
          @foreach($courses as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="inputCourse">Choose Batch:</label>
        <select id="batch" name="batch" class="form-control">
          <option value="" disabled selected>Please Select Batch</option>
        </select>
        
      </div>

      <div class="form-group col-md-2 mt-2">
        <button type="submit" class="btn btn-primary mt-4" id="search">Search</button>
      </div>
      
    </div>
  </form>
  <form>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>To Date:</label>
        <span>{{$todayDate}}</span>
      </div>
      <div class="form-group col-md-4">
        <div class="input-group md-form form-sm form-1 pl-0">
          <div class="input-group-prepend">
            <span class="input-group-text" style="color: Dodgerblue;" id="basic-text1"><i class="fas fa-search"
                aria-hidden="true"></i></span>
          </div>
          <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
        </div>
      </div>
    </div>

    <div class="form-row">
      @isset($groups)
      @if(count($groups) > 0)
      
            @foreach($groups as $group)
            <div class="row">
              <div class="col-md-8 bg-dark text-white">
                <p>{{$group->name}} Group</p>
              </div>
            </div>
            @php
              $i = 1;
              $checked = true;
            @endphp
            @foreach($group->students as $row)
            <div class="row mt-2">
            
              <div class="col-md-2">
                {{$i++}}
              </div>
              <div class="col-md-3">
                {{$row->namee}}
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="check{{$row->id}}" name="check{{$row->id}}" checked="" data-remark="remark{{$row->id}}">
              </div>
             
              <div class="col-md-3 remark">
                <input type="text" name="remark" class="form-control remark{{$row->id}}" style="display: none;">
              </div>
           
            </div>
            @endforeach
              
            @endforeach
         
      @endif
    @endif
    </div> 
  </form>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
  <script type="text/javascript">
    // $('input[name="remark"]').hide();
    $('input[type="checkbox"]').click(function(){
      var remark=$(this).data('remark');
      alert(remark);
      $(this).removeAttr('checked');
    if($(this).is(':checked')){
        $('.'+remark).hide();
    }else{
        $('.'+remark).show();
    }
});
  </script>
  
@endsection