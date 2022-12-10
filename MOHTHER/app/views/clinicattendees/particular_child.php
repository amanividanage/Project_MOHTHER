<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">


        <!-- <h1 class="content_h1">Welcome, <?php if(isset($_SESSION['clinicattendee_id'])){
            echo explode(" ", $_SESSION['clinicattendee_name'])[0];
            } else {
                echo 'Guest';
            }
        ?>
        </h1> -->



        <a href="<?php echo URLROOT; ?>/clinicattendees/children"><button class="back_btn">Children</button></a>

        <br> <br>
        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Dashboard</button></a>

        <br><br>

        <h2>Child_1 <a href="<?php echo URLROOT; ?>/clinicattendees/child_profile"><button
                    class="profile_btn"><b>Profile
                    </b></button></a> </h2>





        <div class="row_CA">

            <div class="dashboard_C">
                <h4>Next Clinic Date</h4> <br>
                <div class="">
                    Monthly Clinic

                    <br><br>
                    Date: 2022/05/03

                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/child_timeslot_mothlyclinic"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>

                <br> <br>

                <div class="">
                    Next vaccination

                    <br><br>
                    Date: 2022/05/03

                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/child_timeslot_vaccination"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>
            </div>


            <div class="dashboard_CA">
                <!-- <h4>Children</h4> <br> -->



                <br>

                <div class="">
                    Charts
                    <a href="<?php echo URLROOT; ?>/clinicattendees/chart"><button
                            class="reserve_btn"><b>GO</b></button></a>


                    <br><br> <br><br> <br><br>
                    Vaccination

                    <a href="<?php echo URLROOT; ?>/clinicattendees/child_vaccination"><button
                            class="reserve_btn"><b>Go</b></button></a>

                </div>




            </div>

        </div>




        <div class="">

            <div class="welcomebox">

            </div>
            <br> <br>



            <h3>Monthly Reports </h3>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Weight Gain</th>
                        <th>Skin color</th>
                        <th>Eye sight</th>
                        <!-- <th>Temperature</th> -->
                        <th></th>

                        <!-- <th>Nature of the umbilicus</th>
                        <th>Medications</th> -->

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <!-- <td></td> -->
                        <!-- <td></td>
                        <td></td> -->

                        <td colspan=2><a href="<?php echo URLROOT; ?>/clinicattendees/child_report"><button
                                    class="reserve_btn"><b>More</b></button></a></td>
                    </tr>







                </tbody>
            </table>



        </div>




        <?php require APPROOT . '/views/inc/footer.php'; ?>