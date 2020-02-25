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
          <input class="form-control my-0 py-1" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
        </div>
      </div>
    </div>
<div id="over">
  <form action="{{route('attendances.store')}}" method="post" >
    @csrf
    @if($attcount==0)

 
      @isset($groups)
      @if(count($groups) > 0)
      
            @foreach($groups as $group)
            <div class="row">
              <div class="col-md-12 bg-dark text-white">
                <p id="g">{{$group->name}} Group</p>
              </div>
            </div>
            @php
              $i = 1;
              $checked = true;
            @endphp
            <p id="aa"></p>
            @foreach($group->students as $row)

            <div class="row mt-2">
            
              <div class="col-md-2">
                {{$i++}}
              </div>
              <div class="col-md-3">
                <input type="hidden" name="studentid[]" value="{{$row->id}}" multiple="">
                <p id="n"> {{$row->namee}}</p>
              </div>
              <div class="col-md-2">

                @php
                
                  $rowcount = $row->attendance()->where('status', '=', '1')->get();
                  
                if($rowcount){
                 $totalcount = count($rowcount);
               }else{
                $totalcount = 0;
                }
                @endphp
                {{$totalcount}}
               
                
              
                
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="check{{$row->id}}" name="check{{$row->id}}" checked="" data-remark="remark{{$row->id}}">
              </div>
             
              <div class="col-md-3 mb-2">
                <input type="text" name="remark[]" class="form-control remark{{$row->id}}" style="display: none;" id="remark">
              </div>
           
            </div>
            @endforeach
              
            @endforeach
         
      @endif
      
      <input type="submit" value="Save" class="btn btn-primary">
      @endif
    @endif
    
  </form>
</div>

@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>



  <script type="text/javascript">
    $('#over').show();
    // $('input[name="remark"]').hide();
    $('#over').on('click','input[type="checkbox"]',function(){
    // $().click(function(){
      var remark=$(this).data('remark');
      
      $(this).removeAttr('checked');
      if($(this).is(':checked')){
          $('.'+remark).hide();
          $("#remark").val('');

      }else{
          $('.'+remark).show();
      }
    });

   $(document).on('keyup', '#search', function(){
      
  
    // Determine specified search term
    //var searchTerm = $(this).val();
    // Highlight search term inside a specific context
    
      var searchquery = $(this).val();
      //alert(searchquery);
      if(searchquery == ''){
        $('p').removeAttr('style');
      }else{
      $.ajax({
       url:"{{ route('attendances_search.action') }}",
       method:'GET',
       data:{searchquery:searchquery},
       dataType:'json',
       success:function(data)
       {


            $.each(data,function(i,v){
             console.log(v.namee);
             if(v){

              var vname = v.namee;
             /* document.getElementById('over').innerHTML = `<form action="{{route('attendances.store')}}" method="post" >
   

            <div class="row mt-2">
            
              <div class="col-md-3">
                <input type="hidden" name="studentid[]" value="${v.id}" multiple="">
                <p id="n"> ${v.namee}</p>
              </div>
              <div class="col-md-2">

                
               
              </div>
              <div class="col-md-2">
                <input type="checkbox" class="check${v.id}" name="check${v.id}" checked="" data-remark="remark${v.id}">
              </div>
             
              <div class="col-md-3 mb-2">
                <input type="text" name="remark[]" class="form-control remark${v.id}" style="display: none;">
              </div>
           
            </div>
              
         
     
    
  </form>`;*/
  

          $( "p:contains('"+vname+"')" ).css( "color", "red" );


            
             }
           
            })

        }
      });
    }

  })

  
  </script>



  
@endsection
<style type="text/css">
    mark {
  background: orange;
  color: black;
}
</style>
