$(document).ready(function(){
   var notificationsToggle    = $('.noti');
     // var notificationsCountElem = notificationsToggle.find('i[data-count]');
    // var notificationsCountElem = notificationsToggle.find('span').text();
     // alert(notificationsCountElem);
    //  var notificationsCount     = parseInt(notificationsCountElem);
     // console.log(notificationsCount);
      //var notifications          = notificationsWrapper.find('ul.dropdown-menu');
        showNoti();
        function showNoti(){
        $.get("/getnoti",function(response){
        var count = response.length;
        if(count > 0){
        notificationsToggle.find('span').html(count);
        }else {
          notificationsToggle.find('span').text(0);
        }
      });
    }
     /* if (notificationsCount <= 0) {
        notificationsToggle.hide();
      }*/

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;
          Pusher.logToConsole = true;

     var pusher = new Pusher('0569f3090279c1cbab87', {
      cluster: 'ap1'
    });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('my-channel');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('my-event', function(data) {
      //  alert(JSON.stringify(data));
        
        showNoti();
        notificationsToggle.show();
      });

       $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.coll').click(function(){
                    var poid = $(this).data('poid');
                    var baid = $(this).data('baid');
                    var v = window.location.pathname;
                    
                     $.post('notiread',{poid:poid,baid:baid},function(response){
                        console.log(response);
                        if(response == 'Successful'){
                            
                            $('#collapse'+poid).collapse('show');
                           

                            showNoti();
                        }
                    })
                })
})