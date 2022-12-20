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
        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a>

        <br>

        <h1> Zoom Session</h1>

        <div class="bg_index">
            <div class="home_CA">
                <div class="">
                    <h1 class="session_h1">Session</h1>
                    <br>

                    <b>
                    by Admin User - Sunday, 30 October 2022, 11:23 AM
                    <br><br>Date: 2022/05/03
                    <br><br>Time: 8 a.m
                    <br><br>Via Zoom
                    </b>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/zoomlink"><button class="zoom_btn">Via Zoom</button></a>
                    </div>
                </div>
            </div>
        </div>
        

        

    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>




        
    


    