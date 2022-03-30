jQuery(document).ready(function($) {
    //payment follow up btn
    $("#btn_load_payment_followup").on("click", function(e) {
        e.preventDefault();
        $(".modal").modal("hide");
        $("#myModal2").modal("show");
        payment_followup();
        //$(".calender_dashboard").fullCalendar("render");
        setTimeout(function() {
            $(".calender_dashboard").fullCalendar("render");
        }, 300); // Set enough time to wait until animation finishes;
    });

    //Advance payment follow up btn
    $("#btn_load_ad_payment_followup").on("click", function(e) {
        e.preventDefault();
        $(".modal").modal("hide");
        $("#myModal4").modal("show");
        advance_payment_followup();
        setTimeout(function() {
            $(".calender_dashboard").fullCalendar("render");
        }, 300); // Set enough time to wait until animation finishes;
    });

    //Balance payment follow up btn
    $("#btn_load_balance_payment_followup").on("click", function(e) {
        e.preventDefault();
        $(".modal").modal("hide");
        $("#myModal5").modal("show");
        balance_payment_followup();
        setTimeout(function() {
            $(".calender_dashboard").fullCalendar("render");
        }, 300); // Set enough time to wait until animation finishes;
    });

    //Travel button
    $("#btn_load_travel_followup").on("click", function(e) {
        e.preventDefault();
        $(".modal").modal("hide");
        $("#myModal3").modal("show");
        travel_dates_followup();
        setTimeout(function() {
            $(".calender_dashboard").fullCalendar("render");
        }, 300); // Set enough time to wait until animation finishes;
    });


    //payment follow up calendar
    function payment_followup() {
        var BASE_URL = $("#base_url").val(); // Here i define the BASE_URL
        // Fullcalendar
        $('#calendar_payment_followup').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, basicWeek, basicDay'
            },
            // Get all events stored in database
            displayEventTime: false,
            eventLimit: true, // allow "more" link when too many events
            events: BASE_URL + 'dashboard/getAllPaymentFollowupCalendar',
            selectable: true,
            selectHelper: false,
            editable: false, // Make the event resizable true  
            // resourceGroupField: 'c_id',
            eventRender: function(event, element, view) {
                //console.log(event.id);
                $(element).each(function() {
                    $(this).attr('date-num', event.start.format('YYYY-MM-DD'));
                    $(this).attr('date-event_id', event.id);
                });

                element.find(".fc-event-title").remove();
                element.find(".fc-event-time").remove();
                var new_description =
                    '<span data-event_id ="event_' + event.id + '"> Amount: ' + event.amount +
                    '/-</span><br/>';
                element.append(new_description);
            },
            eventAfterAllRender: function(view) {
                for (cDay = view.start.clone(); cDay.isBefore(view.end); cDay.add(1, 'day')) {
                    var dateNum = cDay.format('YYYY-MM-DD');
                    var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
                    var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
                    var DCount = $('.fc-event[date-event_id="' + dateNum + '"]').length;
                }
            },
        });
    }

    //advance_payment_followup follow up calendar
    function advance_payment_followup() {
        var BASE_URL = $("#base_url").val(); // Here i define the BASE_URL
        // Fullcalendar
        $('#calendar_advance_payment_followup').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, basicWeek, basicDay'
            },
            // Get all events stored in database
            displayEventTime: false,
            eventLimit: true, // allow "more" link when too many events
            events: BASE_URL +
                'dashboard/advance_payment_pending_followup?type=1', // Type 1 = pay received less than 50%
            selectable: true,
            selectHelper: false,
            editable: false, // Make the event resizable true  
            // resourceGroupField: 'c_id',
            eventRender: function(event, element, view) {
                //console.log(event.id);
                $(element).each(function() {
                    $(this).attr('date-num', event.start.format('YYYY-MM-DD'));
                    $(this).attr('date-event_id', event.id);
                });

                element.find(".fc-event-title").remove();
                element.find(".fc-event-time").remove();
                var new_description =
                    '<span data-event_id ="event_' + event.id + '"> Amount: ' + event.amount +
                    '/-</span><br/>';
                element.append(new_description);
            },
            eventAfterAllRender: function(view) {
                for (cDay = view.start.clone(); cDay.isBefore(view.end); cDay.add(1, 'day')) {
                    var dateNum = cDay.format('YYYY-MM-DD');
                    var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
                    var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
                    var DCount = $('.fc-event[date-event_id="' + dateNum + '"]').length;
                }
            },
        });
    }

    //balance_payment_followup follow up calendar
    function balance_payment_followup() {
        var BASE_URL = $("#base_url").val(); // Here i define the BASE_URL
        // Fullcalendar
        $('#calendar_bal_payment_followup').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, basicWeek, basicDay'
            },
            // Get all events stored in database
            displayEventTime: false,
            eventLimit: true, // allow "more" link when too many events
            events: BASE_URL +
                'dashboard/advance_payment_pending_followup?type=2', // Type 2 = pay pending less than 50%
            selectable: true,
            selectHelper: false,
            editable: false, // Make the event resizable true  
            // resourceGroupField: 'c_id',
            eventRender: function(event, element, view) {
                //console.log(event.id);
                $(element).each(function() {
                    $(this).attr('date-num', event.start.format('YYYY-MM-DD'));
                    $(this).attr('date-event_id', event.id);
                });

                element.find(".fc-event-title").remove();
                element.find(".fc-event-time").remove();
                var new_description =
                    '<span data-event_id ="event_' + event.id + '"> Amount: ' + event.amount +
                    '/-</span><br/>';
                element.append(new_description);
            },
            eventAfterAllRender: function(view) {
                for (cDay = view.start.clone(); cDay.isBefore(view.end); cDay.add(1, 'day')) {
                    var dateNum = cDay.format('YYYY-MM-DD');
                    var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
                    var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
                    var DCount = $('.fc-event[date-event_id="' + dateNum + '"]').length;
                }
            },
        });
    }

    //Travel Follow Up 
    function travel_dates_followup() {
        var BASE_URL = $("#base_url").val(); // Here i define the BASE_URL
        // Fullcalendar
        $('#calendar_travel_dates').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, basicWeek, basicDay'
            },
            // Get all events stored in database
            displayEventTime: false,
            eventLimit: true, // allow "more" link when too many events
            events: BASE_URL + 'dashboard/getAllTravelDatesCalendar',
            selectable: true,
            selectHelper: false,
            editable: false, // Make the event resizable true  
            // resourceGroupField: 'c_id',
            eventRender: function(event, element, view) {
                //console.log(event.id);
                $(element).each(function() {
                    $(this).attr('date-num', event.start.format('YYYY-MM-DD'));
                    $(this).attr('date-event_id', event.id);
                });

                element.find(".fc-event-title").remove();
                element.find(".fc-event-time").remove();
                /* var new_description = 
                	'<span data-event_id ="event_'+ event.id +'"> Amount: ' + event.amount + '/-</span><br/>' 
                ;
                element.append(new_description); */
            },
            eventAfterAllRender: function(view) {
                for (cDay = view.start.clone(); cDay.isBefore(view.end); cDay.add(1, 'day')) {
                    var dateNum = cDay.format('YYYY-MM-DD');
                    var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
                    var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
                    var DCount = $('.fc-event[date-event_id="' + dateNum + '"]').length;
                }
            },
        });
    }
});