<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
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
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
<div class= "calendarcontent">
<div class ="calendar-container">
<div id ="calendar">
   

</div>



</div>

<div class= "insertdates">
       <div>
        <table>
            <tr>
            <!-- <td> <a href="<!?php echo URLROOT; ?>/calendars/createclinic/<?php echo $data['clinic']->gnd; ?>"> <button class="add">Create Clinics</button></a></td></tr>
                      -->
                    </div>
                    <!-- <script>const id = <!?php echo $id; ?>;</script> -->

                </div>
<script src="<?= URLROOT ?>/js/monthlyappointment.js">const id = <?php echo $id; ?>;</script>

