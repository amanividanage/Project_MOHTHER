<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> -->
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- full calendar CDN  -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
<div class= "calendarcontent">
<div class ="calendar-container">
<div id ="calendar">
</div>
</div>
</div>

<script>
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

    var clinicDates = <?php echo json_encode($data['clinicDates']); ?>;
    calendar.addEventSource(clinicDates);

});
</script>
<!-- <script src="<!?= URLROOT ?>/js/newjs.js"></script> -->
<!-- <script src="<!?= URLROOT ?>/js/maternityCalendar.js"></script> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>
 
 