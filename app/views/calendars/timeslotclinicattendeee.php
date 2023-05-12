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
           
        </div>
        <div class="newregdetails">
            <table>
                <tr>
                <?php if ($data['exactbookedTimeslot']== TRUE): ?>
           
           <td ><i class="fa fa-check" aria-hidden="true"></i><a href="<?php echo URLROOT; ?>/pages/contact"><button class="more1999">Complete Registration</button></a></td>
           <?php else: ?>
            <td><a href="<?php echo URLROOT; ?>/calendars/timeslotclinicattendeee/<?php echo $data['nic']; ?>/<?php echo $data['timeSlots'][0]->calendar_id; ?>"><button class="more1999">Please select a time slot and then click here to complete registration</button></a>
           <?php endif; ?>
           </td>
                </tr>
                <tr>
                    <th>Details</th>
                 
                 
                <?php foreach($data['timeSlots'] as $timeSlot): ?>
                    <tr>
    <td class="timeslotbox"><?php echo $timeSlot->start_time; ?> - <?php echo $timeSlot->end_time; ?></td>
    <td>
        <?php if ($timeSlot->nic == NULL ): ?>
           
            <button class="book-now-btn" data-calendar-id="<?php echo $timeSlot->calendar_id ?>" nic="<?php echo $data['nic']; ?>" data-clinic-timeslot-id="<?php echo $timeSlot->clinic_timeslot_id ?>">Book now</


        <?php else: ?>
            <button disabled  class="green-button">Booked</button>
        <?php endif; ?>
    </td>
</tr>

                    <div id="modal" class="modal">
                        
        <div class="midwifeupdateinfo">
      
        <form id="booking-form" action="<?php echo URLROOT; ?>/calendars/booktimeslotInitial/<?php echo $data['nic']; ?>/<?php echo $data['timeSlots'][0]->calendar_id; ?>/<?php echo $timeSlot->clinic_timeslot_id; ?>" method="POST">


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
    
    const bookNowBtns = document.querySelectorAll('.book-now-btn');
    bookNowBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const calendarId = btn.getAttribute('data-calendar-id');
            const nic = btn.getAttribute('nic');
            const clinicTimeslotId = btn.getAttribute('data-clinic-timeslot-id');
            
            bookingForm.action = `<?php echo URLROOT; ?>/calendars/booktimeslotInitial/${nic}/${calendarId}/${clinicTimeslotId}`;
            modal.style.display = "block";
        });
    });

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
