$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#detailModal').on('hidden.bs.modal', function () {
        if($('.delete').hasClass('selected')){
            $('#detailModal').find('.delete').removeClass('selected');

        }

        $('#addForm').trigger("reset");
        // $('#editForm').trigger("reset");

    })

    var cid; var bid; var calendar_path; var clickId;
    var default_type = $(".types").val();

    

    var calendarEl = document.getElementById('calendar');

    scheduleType(default_type);
    getSchedule();

    $("").hide();
    $("").hide();

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.js-example-basic-single').select2({
        theme: 'bootstrap4',

    });

    $('.teacher').select2({
        theme: 'bootstrap4',

    });
    function scheduleType(data){
        if (data == 'Timetable') {
            $(".titleDiv").show();
            $(".holidayDiv").hide();

            $(".disputableholidayDiv").show();
            $(".colorDiv").show();
            $(".courseDiv").show();
            $(".batchDiv").show();
            $(".teacherDiv").show();
            $(".subjectDiv").show();
        }
        else if(data == 'Holiday'){
            $(".titleDiv").show();
            $(".holidayDiv").show();

            $(".disputableholidayDiv").hide();
            $(".colorDiv").hide();
            $(".courseDiv").hide();
            $(".batchDiv").hide();
            $(".teacherDiv").hide();
            $(".subjectDiv").hide();
        }
        else if(data == 'Activity' || data == 'Guest Speaker'){
            $(".titleDiv").show();
            $(".disputableholidayDiv").show();
            $(".colorDiv").show();
            $(".courseDiv").show();
            $(".batchDiv").show();


            $(".holidayDiv").hide();
            $(".teacherDiv").hide();
            $(".subjectDiv").hide();
        }

        else if(data == 'Closed'){
            $(".titleDiv").show();
            $(".holidayDiv").show();
            $(".courseDiv").show();
            $(".batchDiv").show();

            $(".disputableholidayDiv").hide();
            $(".colorDiv").hide();

            $(".teacherDiv").hide();
            $(".subjectDiv").hide();
        }

        else if(data == 'Presentation' || data== 'Project Time'){
            $(".titleDiv").show();
            $(".holidayDiv").hide();

            $(".disputableholidayDiv").show();

            $(".colorDiv").show();
            $(".courseDiv").show();
            $(".batchDiv").show();
            $(".subjectDiv").show();

            $(".teacherDiv").hide();

        }

        else if(data=='Exam'){
            $(".titleDiv").show();
            $(".disputableholidayDiv").show();

            $(".colorDiv").show();
            $(".courseDiv").show();
            $(".batchDiv").show();
            $(".subjectDiv").show();

            $(".teacherDiv").hide();
            $(".holidayDiv").hide();

        }

        else{
            $(".titleDiv").hide();
            $(".holidayDiv").hide();

            $(".disputableholidayDiv").hide();
            $(".colorDiv").hide();
            $(".courseDiv").hide();
            $(".batchDiv").hide();
            $(".teacherDiv").hide();
            $(".subjectDiv").hide();
        }
        
    }

    // Choose Holiday Type Close Other Fields
    $('.types').change(function () {
        var type = $(this).val();

        scheduleType(type);

    });


    $('.courses').change(function () {
        var cid = $(this).val();
        batchChange(cid);
    });

    $('.batches').change(function () {
        var bid = $(this).val();
 
        teacherChange(bid);
    });

    $('.courses').change(function () {
        var cid = $(this).val();

        subjectChange(cid);
    });

    function batchChange(cid, bid){
        $.post("/getBatchByCourse_schedule",{id:cid},function (res) {
          
            $('.batches').prop('disabled',false);

            var html = `<option value="">Choose Batch</option>`;
            $.each(res,function (i,v) {
                if (bid) 
                {
                    if (bid == v.id) 
                    {
                        html +=`<option value="${v.id}" selected>${v.title}</option>`;
                    }
                    else
                    {
                        html +=`<option value="${v.id}">${v.title}</option>`;
                    }
                }
                else
                {
                    html +=`<option value="${v.id}">${v.title}</option>`;
                }
            })

            $('.batches').html(html);
            

        })
    }

    function teacherChange(bid, tid){
        $.post("/getTeacherByBatch_schedule",{id:bid},function (res) {
    
            $('.teacher').prop('disabled',false);

            var html ='' ;

            $.each(res, function( key, value ) {
                if (tid) {
                    if (tid == value.id) {
                        html +=`<option value="${value.id}" selected>${value.name}</option>`;

                    }
                    else{
                        html +=`<option value="${value.id}">${value.name}</option>`;

                    }
                }
                else{
                    html +=`<option value="${value.id}">${value.name}</option>`;
                }
            });
            
                                
            $('.teacher').html(html);
        })
    }

    function subjectChange(cid, sid){
        $('.js-example-basic-single').prop('disabled',false);


        $.post("/show_subject",{id:cid},function (res) {
            var data = JSON.parse(res);
            var html ='';

            $.each(data,function (i,v) {
                if (sid) {
                    if (sid == v.id) {
                        html +=`<option value="${v.id}" selected>${v.name}</option>`;

                    }
                    else{
                        html +=`<option value="${v.id}">${v.name}</option>`;

                    }
                }else{
                    html +=`<option value="${v.id}">${v.name}</option>`;

                }

            });

            $('.js-example-basic-single').html(html);

        });
    }

    $('#course').change(function () {
        var cid = $(this).val();
        $.post("/getBatchByCourse_schedule",{id:cid},function (res) {
      
            $('#batch').prop('disabled',false);

            var html = `<option selected disabled>Please Choose Batch:</option>`;
            $.each(res,function (i,v) {
                
                    html +=`<option value="${v.id}">${v.title}</option>`;
            });

            $('#batch').html(html);
        })
    });

    $('.searchBtn').on("click",function(){
        var cid = $('#course').val();
        var bid = $('#batch').val();

        getSchedule(bid);
        //post code
    })

    function getSchedule(bid){
        console.log(calendar_path);
        if (bid) {
                calendar_path = "getschedule_byBatch/:id";
                calendar_path=calendar_path.replace(':id',bid);

                console.log(calendar_path);
                change_eventpath(calendar_path);
        }
        else{
            
            calendar_path = 'getallSchedules';
            

        }
    }
//===================================================================================
    // Calendar 
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'Asia/Yangon',
        // droppable: true,
        initialView: 'dayGridMonth',
        headerToolbar: { 
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek' 
        },
        buttonText: {
            dayGridMonth: 'Month',
            timeGridWeek: 'Week',
            dayGridDay: 'Day',
            listWeek: 'List Week'
        },
        editable: false,
        eventTimeFormat: { // like '14:30:00'
            hour: 'numeric',
            minute: '2-digit',
            meridiem: false
        },
        events: calendar_path,
        eventClick: function(arg) {
            clickId = arg.event.id;
            
            detailSchedule(clickId);
        },
        eventDidMount: function(info) {

            var title = info.event.title;

            var batch = info.event.extendedProps.description;

            if (batch) {
                var subtitle = batch+'<br>'+title;
            }else{
                var subtitle = title;
            }

            var liElement = info.el;
            
            // var node = $(liElement).jstree(true).get_node('1, true');

            $(info.el).tooltip({
                title: subtitle,
                placement: 'top',
                trigger: 'hover',
                container: 'body',
                html: true,
            });

            
            
        },
        dayMaxEvents: true,


    });
    calendar.render();

    function change_eventpath(calendar_path){
        removeEvents = calendar.getEventSources();

        removeEvents.forEach(event => {
            event.remove();
        });

        calendar.addEventSource(calendar_path);
    }

    // Add Schedule
    calendar.on('dateClick', function(info) {
        var dateTime = info.dateStr;

        $('input[name="start"]').val(dateTime);
        $('input[name="holidaydate"]').val(dateTime);
        
        $('#addModal').modal('show');


    });

    // ADD Schedule to Database
    $("#addModal").on('submit','#addForm',function(e){
        e.preventDefault();
        
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: create_path,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {  

                $("#addModal").modal("hide");
                $('#addForm').trigger("reset");

                calendar.render();
                calendar.refetchEvents();

            }
        });
    });

    function detailSchedule(id){

        detail_url=detail_path.replace(':id',id);


        $.ajax({
            type:'GET',
            url: detail_url,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {  

                var schedule = data.schedule;

                var id = schedule.id;
                var title = schedule.title;
                var start = schedule.start;
                var end = schedule.end;
                var date = schedule.date;
                var day = schedule.day;
                var time = schedule.time;
                var type = schedule.type;
                var color = schedule.color;
                var user = schedule.user;

                var batch_id = schedule.batch_id;
                var batch_title = schedule.batch_title;
                var batch_type = schedule.batch_type;
                var batch_startdate = schedule.batch_startdate;
                var batch_enddate = schedule.batch_enddate;
                var batch_time = schedule.batch_time;
                var course_name = schedule.course_name;

                var location = schedule.location;
                var city = schedule.city;

                var subject_id = schedule.subject_id;
                var subject_name = schedule.subject_name;

                var teacher_id = schedule.teacher_id;
                var teacher_name = schedule.teacher_name;


                // Pretty Date
                const d = new Date(date);
                const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
                const mo = new Intl.DateTimeFormat('en', { month: 'long' }).format(d);
                const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);

                var pretty_date = `${da} ${mo}`;

                
                $('#detail_title').text(title);

                $("#detail_square").css({"background":color});

                $('#detail_date').text(day+', '+pretty_date);

                $('#detail_title').text(title);
                $('#detail_batchtitle').text(batch_title);

                $('#detail_time').text(time);

                if (!teacher_name) {
                    $('#detail_teacherdiv').hide();
                }
                $('#detail_teachername').text(teacher_name);


                $('#detail_username').text(user);

                $("#detailModal").modal("show");

            }
        });
    }

    // EDIT
    $("#detailModal").on('click','.editBtn',function(e){
        e.preventDefault();

        var id = clickId;

        edit_url=edit_path.replace(':id',id);

        $.ajax({
            type:'GET',
            url: edit_url,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {  

                var schedule = data.schedule;

                var id = schedule.id;
                var title = schedule.title;
                var date = schedule.date;
                var time = schedule.time;
                var start = schedule.start;
                var end = schedule.end;
                var type = schedule.type;
                var color = schedule.color;

                var batch_id = schedule.batch_id;

                var course_id = schedule.course_id;

                var subject_id = schedule.subject_id;

                var teacher_id = schedule.teacher_id;

                $("#e_inputType option[value='"+type+"']").attr("selected","selected");
                        scheduleType(type);

                $('#e_inputTitle').val(title);
                $('#e_inputTitle').val(title);

                if (type == "Holiday") {
                    $('input[name="holidaydate"]').val(date);

                }
                else{
                    $('input[name="start"]').val(start);
                    $('input[name="end"]').val(end);

                    $(function() {
                        batchChange(course_id, batch_id);
                        teacherChange(batch_id, teacher_id);
                        subjectChange(course_id, subject_id);
                    });

                    $("#e_inputCourseid option[value='"+course_id+"']").attr("selected","selected");
                }

                if (color == "#21BA45") {
                    $('#e_green').attr('checked', 'checked');
                }
                else if (color == "#FBBD08") {
                    $('#e_yellow').attr('checked', 'checked');
                }
                else if (color == "#B5CC18") {
                    $('#e_olive').attr('checked', 'checked');
                }
                else if (color == "#F2711C") {
                    $('#e_orange').attr('checked', 'checked');
                }
                else if (color == "#00B5AD") {
                    $('#e_teal').attr('checked', 'checked');
                }
                else if (color == "#2185D0") {
                    $('#e_blue').attr('checked', 'checked');
                }
                else if (color == "#6435C9") {
                    $('#e_violet').attr('checked', 'checked');
                }
                else if (color == "#A333C8") {
                    $('#e_purple').attr('checked', 'checked');
                }
                else if (color == "#E03997") {
                    $('#e_pink').attr('checked', 'checked');
                }
                else if (color == "#607D8B") {
                    $('#e_bluegray').attr('checked', 'checked');
                }
                else{
                }
                


                $("#detailModal").modal("hide");
                $("#editModal").modal("show");

            }
        });

        


        
    });

    // UPDATE Schedule to Database
    $("#editModal").on('submit','#editForm',function(e){
        e.preventDefault();

        update_url=update_path.replace(':id',clickId);
        
        var formData = new FormData(this);


        $.ajax({
            type:'POST',
            url: update_url,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {  

                $("#editModal").modal("hide");
                $('#editForm').trigger("reset");

                calendar.render();
                calendar.refetchEvents();


            }
        });
    });

    var deleteBox = '<span class="deleteBox"><p>Are you sure you want to delete?</p><span class="cancel">Cancel</span><span class="confirm">Yes</span></span>';
    var deleteBtn;
    $("#detailModal").on('click','.delete',function(e){
    // $('.delete').each(function(){
        $('#detailModal').find('.delete').append(deleteBox);
        deleteBtn = $(this);
        // $(this).append(deleteBox);
        if(!deleteBtn.hasClass('selected')){
            deleteBtn.addClass('selected');
            var owner = $(this);
            
            deleteBtn.find('.cancel').unbind('click').bind('click',function(){
                $('#detailModal').find('.delete').removeClass('selected');
                // owner.removeClass('selected');
                return false;
            })
            
            deleteBtn.find('.confirm').unbind('click').bind('click',function(){
                deleteBtn.parent().addClass('loading');
                var parent = $(this).parent();
                
                //ajax to delete
                
                delete_url=delete_path.replace(':id',clickId);

                $.ajax({
                    type:'DELETE',
                    url: delete_url,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {  
                        $('#detailModal').find('.delete').removeClass('selected');

                        $("#detailModal").modal("hide");
                        $('#editForm').trigger("reset");
                        $('#addForm').trigger("reset");

                        calendar.render();
                        calendar.refetchEvents();


                    }
                });
                return false;
            })
        }       
        return false;
    });

}); 
