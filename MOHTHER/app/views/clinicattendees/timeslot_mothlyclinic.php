<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>

    <div class="content">

        <a href="<?php echo URLROOT; ?>/clinicattendees" class="back_btn"> <button class="back_btn">Back</button></a>
        <br><br>
        <h1 class="time">Please select a time</h1>

        <div class="timeslots" style="height:300px; width: 700px;border: 1px solid #ddd;">
            <div class="days">
                <div class="day">
                    <div class="datelabel"><strong>Friday</strong><br />August 23</div>
                    <div class="timeslot">9:00am</div>
                    <div class="timeslot">9:30am</div>
                    <div class="timeslot">10:00am</div>
                </div>
                <div class="day">
                    <div class="datelabel"><strong>Saturday</strong><br />August 24</div>
                    <div class="timeslot">10:30pm</div>
                </div>
                <div class="day">
                    <div class="datelabel"><strong>Sunday</strong><br />August 25</div>
                    <div class="timeslot">10:30pm</div>
                </div>
                <div class="day">
                    <div class="datelabel"><strong>Monday</strong><br />August 26</div>
                    <div class="timeslot">10:30pm</div>
                </div>
                <div class="day">
                    <div class="datelabel"><strong>Tuesday</strong><br />August 27</div>
                    <div class="timeslot">10:30pm</div>
                </div>
            </div>
        </div>


    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>