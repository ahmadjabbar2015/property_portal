
        $(document).ready(function() {

            // pass _token in all ajax
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
            // initialize calendar in all events
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "/calendar",
                displayEventTime: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                            event.allDay = true;
                    } else {
                            event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                
                select: function (start, end, allDay) {
                    
                //    var data= $("#dialog").dialog();
                //    var event_name=document.getElementById("#event_name");
                //    alert(event_name);
                    var event_name = prompt('Event Name:');
                    // var today=new Date();
                    // var monthNames = [ "January", "February", "March", "April", "May", "June",
                    //     "July", "August", "September", "October", "November", "December" ];
                    // var end = prompt('End date', today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());

                    // var start = prompt('date');
                    
                    if (event_name) {
                        var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
                        var today=new Date();
                    var monthNames = [ "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December" ];
                    var end = prompt('End date', today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());

                        // var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "/calendar/create-event",
                            data: {
                                title: event_name,
                                start: start,
                                end: end
                            },
                            type: 'post',
                            success: function (data) {
                               iziToast.success({
                                    position: 'topRight',
                                    message: 'Event created successfully.',
                                });

                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: event_name,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");

                    $.ajax({
                        url: "/calendar/edit-event",
                        data: {
                            title: event.event_name,
                            start: start,
                            end: end,
                            id: event.id,
                        },
                        type: "POST",
                        success: function (response) {
                            iziToast.success({
                                position: 'topRight',
                                message: 'Event updated successfully.',
                            });
                        }
                    });
                },
                eventClick: function (event) {
                    var eventDelete = confirm('Are you sure to remove event?');
                    if (eventDelete) {
                        $.ajax({
                            type: "post",
                            url: "calendar/remove-event",
                            data: {
                                id: event.id,
                                _method: 'delete',
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                iziToast.success({
                                    position: 'topRight',
                                    message: 'Event removed successfully.',
                                });
                            }
                        });
                    }
                }   
            });
        });

        
$(function () {
    var regiester_events=$("#regiester_events");
    regiester_events.validate({
        rules:{
            title :{
                required: true
            },
            start :{
                required: true
            },
            end :{
                required: true
            },
            
        },
        messages:{
            title:{
                required: "Title field is required"
            },
            start:{
                required: "start Date  field is required"
            },
            end:{
                required: "End Date field is required"
            },
           
        }
    })
})





