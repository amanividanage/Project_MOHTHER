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
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php'; ?>
    <div class="content">
        <div class="time-slot-container">
            <!-- <h2 class="content_h1">Time Slots for <!?php echo $data['timeSlots'][0]->clinic_date; ?></h2> -->
        </div>
        <div class="newregdetails">
            <table>
                <tr>
                    <th>Details</th>
                    <th></th>
                </tr>
                <?php foreach($data['timeSlots'] as $timeSlot): ?>
                    <tr>
    <td class="timeslotbox"><?php echo $timeSlot->start_time; ?> - <?php echo $timeSlot->end_time; ?></td>
    <td>
        <?php if ($timeSlot->nic == NULL ): ?>
            <button onclick="openConfirmationPopup(<?php echo $data['timeSlots'][0]->calendar_id; ?>, <?php echo $timeSlot->clinic_timeslot_id; ?>)">Book now</button>

        <?php else: ?>
            <button disabled  class="green-button">Booked</button>
        <?php endif; ?>
    </td>
</tr>

                    <div id="modal" class="modal">
                        
        <div class="midwifeupdateinfo">
        <!-- <form id="booking-form" action="<!?php echo URLROOT; ?>/calendars/booktimeslot/<!?php echo $timeSlot->$calendar_id; ?>/<!?php echo $timeSlot->clinic_timeslot_id; ?>" method="POST"> -->
        <form id="booking-form" action="<?php echo URLROOT; ?>/calendars/booktimeslot/<?php echo $data['timeSlots'][0]->calendar_id; ?>/<?php echo $timeSlot->clinic_timeslot_id; ?>" method="POST">

        
        
    <h1>Are you sure you want to book this time slot?</h1>
    <!-- <label for="nic"><b>Your NIC <!?php echo $data['getnic']->nic; ?></b></label> -->
    <button id="submit-btn" type="submit">Submit</button>
    <button id="cancel-btn">No</button>
</form>

        </div>
                        
    </div>

                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <script>
    const modal = document.getElementById('modal');
    const bookingForm = document.getElementById('booking-form');
    const submitBtn = document.getElementById('submit-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const calendarId = event.target.getAttribute('data-calendar-id');

    function openConfirmationPopup(calendarId, clinic_timeslot_id) {
        const form = document.getElementById('booking-form');
        form.action = "<?php echo URLROOT; ?>/calendars/booktimeslot/" + calendarId + "/" + clinic_timeslot_id;
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


</body
