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

        <a href="<?php echo URLROOT; ?>/clinicattendees/child"><button class="back_btn">Back</button></a>
        <br><br>
        <br>
        <img src="<?php echo URLROOT;?>/img/c_chart.png" alt="chart" class="cChart">



    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>