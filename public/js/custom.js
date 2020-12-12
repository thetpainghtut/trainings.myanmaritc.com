$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#course').change(function () {
    var cid = $(this).val();
    console.log(cid);
    $.post("/getBatchesByCourse",{id:cid},function (res) {
      
      $('#batch').prop('disabled',false);

      var html = `<option value="">Choose Batch</option>`;
      $.each(res,function (i,v) {
          html +=`<option value="${v.id}">
                  ${v.title}
                </option>`;
      })

      $('#batch').html(html);
    })
  });

  $('#coursem').change(function () {
    var cid = $(this).val();
    console.log(cid);
    $.post("/getBatchByCourse",{id:cid},function (res) {
      
      $('#batch').prop('disabled',false);

      var html = `<option value="">Choose Batch</option>`;
      $.each(res,function (i,v) {
          html +=`<option value="${v.id}">
                  ${v.title}
                </option>`;
      })

      $('#batch').html(html);
    })
  })

  // Select 2

  $('.js-example-basic-multiple').select2({
    placeholder: "Choose members",
  });

  $('#members').prop('disabled',true);
  $('#mentors').prop('disabled',true);


  $('.batch_group').change(function () {
    $('#members').prop('disabled',false);
    $('#mentors').prop('disabled',false);

    $(".js-example-basic-multiple").html('').select2({
      placeholder: "Choose members",
      theme: 'bootstrap4',

    });
    var bid = $(this).val();
    
    $.post('/getstudentformembers',{bid:bid},function (response) {
      // console.log(response);

      var html='<select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">';

      $.each(response,function (i,v) {
        $.each(v.batch,function(a,b) {
          // console.log(b.pivot);
          if(b.id == bid && b.pivot.status=="Active"){
          html += '<option value="'+v.id+'">'+v.namee+'</option>'; 
        }
        })

      })

      html += '</select>';
      $('#members').html(html);
    });

    $.post('/getmentorformembers',{bid:bid},function (response) {
      // console.log(response);

      var html='<select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">';

      $.each(response,function (i,v) {
        
          html += '<option value="'+v.id+'">'+v.name+'</option>'; 

      })

      html += '</select>';
      $('#mentors').html(html);
    });

  });

  
})