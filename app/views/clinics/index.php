<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">

        <div class= "greeting" >
            <b>
                <?php
                date_default_timezone_set('Asia/Colombo'); // Set the time zone
                $now = new DateTime('now', new DateTimeZone('Asia/Colombo')); // Get the current time
                $hour = (int) $now->format('G'); // Get the hour (as an integer)

                if ($hour >= 0 && $hour < 12) {
                    echo $now->format('h:i:s A') . '<br>Good Morning';
                } else if ($hour >= 12 && $hour < 18) {
                    echo $now->format('h:i:s A') . '<br>Good Afternoon';
                } else {
                    echo $now->format('h:i:s A') . '<br>Good Evening';
                }

                echo '<br>';
                echo 'Today is: ' . $now->format('d/m/Y');
                ?>
            </b>
        </div>









            <br>
            <div class="report">
                <h1 class="content_h1">Clinics</h1>
                <a href="<?php echo URLROOT; ?>/clinics/add"><button class="add">Add Clinic</button></a>    
            </div>
            <?php foreach($data['clinics'] as $clinic) : ?>
                <div class="gallery">
                    <a href="<?php echo URLROOT; ?>/clinics/info/<?php echo $clinic->id; ?>">
                        <img src="<?php echo URLROOT;?>/img/clinic.jpg" alt="Cinque Terre" width="600" height="400">
                        <div class="desc"><?php echo $clinic->clinic_name; ?> <br> <font size="2"><i>GND: <?php echo $clinic->gnd; ?></i></font></div>
                    </a>
                    
                    
                </div>
                
            <?php endforeach; ?>

            <!-- <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                    <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div> -->

<?php require APPROOT . '/views/inc/footer.php'; ?>