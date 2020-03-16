$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#course').change(function () {
    var cid = $(this).val();
    
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
  })

  // Select 2

  $('.js-example-basic-multiple').select2({
    placeholder: "Choose members",
  });

  $('#members').prop('disabled',true);

  $('#batch').change(function () {
    $('#members').prop('disabled',false);
    $(".js-example-basic-multiple").html('').select2({
      placeholder: "Choose members",
    });
    var bid = $(this).val();
    $.post('/getstudentformembers',{bid:bid},function (response) {
      // console.log(response);
      var html='<select class="js-example-basic-multiple form-control" name="members[]" multiple="multiple" id="members">';
      $.each(response,function (i,v) {
        html += '<option value="'+v.id+'">'+v.namee+'</option>';
      })
      html += '</select>';
      $('#members').html(html);
    });
  });

  
})