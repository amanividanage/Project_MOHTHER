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
         <h1> Sorry You can only book One time slot per clinic!</h1>
         <h2>If you want to change the time slot press here!</h2>
        </div>
    </div>

 

</body
