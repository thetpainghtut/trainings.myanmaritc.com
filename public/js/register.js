
$(document).ready(function () {
	$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('#inquireStudent').submit(function(event){
		
		event.preventDefault();
		alert('okokok');
		var formdata=new FormData(this);
		//var ul="{{route('students.store')}}";
		console.log(formdata);
		$.post("{{route('students.store')}}",{data:formdata},function(res){
			alert(res);
		});
		/*$.ajax({
		  url: ul,
		  data: formdata,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  
		  success: function(data){
		    alert(data);
		  },
		   error: function(request, status, error) {
	      console.log("error")
	    }

		});*/
	});
    
	
})
