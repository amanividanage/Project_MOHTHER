<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .content h1 {
            font-size: 24px;
            color: #ff4d4d;
            margin-bottom: 100px;
        }

        .content h2 {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php'; ?>
    <div class="content">
        <h1>Sorry, you can only book one time slot per clinic!</h1>
        <h2>If you want to change the time slot, please press here!</h2>
<table>

        <td>
        <!-- <!?php if ($data['timeSlots']->nic == $_SESSION['clinicattendee_nic'] ): ?> -->
            <button onclick="openConfirmationPopup(<?php echo $data['timeSlots'][0]->calendar_id; ?>, <?php echo $data['exactbookedTimeslot']->clinic_timeslot_id; ?>)">Change the time slot</button>

    </td>
</tr>

                    <div id="modal" class="modal">
                        
        <div class="midwifeupdateinfo">
        <!-- <form id="booking-form" action="<!?php echo URLROOT; ?>/calendars/booktimeslot/<!?php echo $timeSlot->$calendar_id; ?>/<!?php echo $timeSlot->clinic_timeslot_id; ?>" method="POST"> -->
        <form id="booking-form" action="<?php echo URLROOT; ?>/calendars/error/<?php echo $data['timeSlots'][0]->calendar_id;  ?>" method="POST">

</form>

        </table>

        </div>
                        
    </div>

    <script>
   
    const bookingForm = document.getElementById('booking-form');
    // const calendarId = event.target.getAttribute('data-calendar-id');

    function openConfirmationPopup(calendar_id, clinic_timeslot_id) {
        const form = document.getElementById('booking-form');
        form.action = "<?php echo URLROOT; ?>/calendars/bookagain/" + calendar_id + "/" + clinic_timeslot_id;
        form.submit();
    }

    submitBtn.addEventListener('click', function() {
        // Handle the submit button click event
        
        // Close the confirmation popup
        modal.style.display = "none";

        // Submit the form
        bookingForm.submit();
    });

    cancelBtn.addEventListener('click', function() {
        // Handle the cancel button click event
        
        // Close the confirmation popup
        modal.style.display = "none";
    });
</script>


    
   
</body>
</html>
