<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <a href="<?php echo URLROOT; ?>/clinicattendees/particular_child"><button class="back_btn">Back</button></a>
        <br><br>
        <h1>Time slots</h1>


        timeslots-clinic date



        <div style="height:280px; width: 700px;overflow:scroll;border: 1px solid #ddd;">
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