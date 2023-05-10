window.addEventListener('DOMContentLoaded', function () {

    const cal = document.getElementById("calendar");

    const calendar = new FullCalendar.Calendar(cal, {
        headerToolbar: {
            right: 'prev,next',
            center: 'title',
            left: ''
        },
        views: {
            list: {
                buttonText: 'List'
            }
        },
        defaultView: 'month',
        initialView: 'dayGridMonth',
        timeZone: 'local',
        editable: true,
        selectable: true,
        eventClick: function (info) {
            console.log(info);
            let reason;

            Swal.fire({
                // title: 'appointment No: ' + info.event.title,
                icon: 'info',
                html: `<h2 style="color: var(--green)">Clinic type : ${info.event.title}</h2>
                        <h3>Start: ${info.event.extendedProps.start_time}</h3>
                        <h3>End: ${info.event.extendedProps.end_time}</h3>`,
                confirmButtonText: 'Go to appointments'
            }).then((result) => {
                if (result.isConfirmed) {
                    const calendarId = info.event.id;
                    const url = `http://localhost/MOHTHER/calendars/timeslot/${calendarId}`;
                    window.location.href = url;
                }
            });
        }
    });

    calendar.render();

    var clinicDates = "<?php echo json_encode($data['clinicDates']); ?>";
    calendar.addEventSource(JSON.parse(clinicDates));

});


    // function getEvents(nic){
    //     $.ajax({
    //         //url: `http://localhost/MOHTHER/calendars/calendarEvents/${phm}`,
    //        url: `http://localhost/MOHTHER/clinicattendees/getGnd/${nic}`,
    //       // url: "http://localhost/MOHTHER/calendars/calendarEvents",
    //         type: 'GET',
    //         dataType: "JSON",
    //         success: function(res) {
    //             console.log(res);
    
    //             res.forEach(function (item) {
    //                 clinicDates.push(
    //                     {
    //                         id: item.clinic_id,
    //                         title: item.title,
    //                         start: item.clinic_date,
    //                         end: item.clinic_date,
    //                         start_time: item.start_event,
    //                         end_time: item.end_event,
    //                         phm: item.phm
//     //                     }
//     //                 );
//     //             });
    
//                 calendar.addEventSource(clinicDates);
//             }
//         });
//     }
// })


