<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a>
        <br><br>
        <h1> Zoom Session</h1>
        <div class="bg_index">
            <div class="home_CA">


                <div class="">
                    <h3>Session</h3>
                    <br>

                    by Admin User - Sunday, 30 October 2022, 11:23 AM
                    <br><br>Date: 2022/05/03
                    <br><br>Time: 8 a.m
                    <br><br>Via Zoom

                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/vaccination"><button class="zoom_btn">Via
                                Zoom</button></a>
                    </div>
                </div>




            </div>
        </div>
    </div>


    <?php require APPROOT . '/views/inc/footer.php'; ?>