@extends('backendtemplate')

@section('content')
  <h2 class="d-inline-block">Create New Expense</h2>
  <a href="{{route('expenses.index')}}" class="btn btn-info float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container">
   <form method="post" action="{{route('expenses.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="locationid" class="col-sm-2 col-form-label">Select Type</label>
      <div class="col-sm-10">
         <select name="type" class="form-control" id="type">
            <option disabled value="">Please Select Year</option>
            <option value="PHP">PHP</option>
            <option value="Recruitment">Recruitment</option>
            <option value="HR">HR</option>
            <option value="General">General</option>
          </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Amount</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputName" name="amount">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputOutline" class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputOutline" name="description"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFees" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputFees" name="date">
      </div>
    </div>

    <div class="form-group row">
        <label for="add_file" class="col-sm-2 col-form-label">Select File</label>
        <div class="col-sm-10">
            <input name="image[]" type="file" class="form-control-file" id="add_file" multiple>
            <span class="text-danger">{{ $errors->first('image') }}</span>
            <div id="preview_img"></div>
        </div>
    </div>
     
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
 </div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
   $('#add_file').on('change', function(){ //on file input change
      if (window.File,window.FileReader,window.FileList,window.Blob) //check File API supported browser
      {
           
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width('100').height('100'); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>
@endsection