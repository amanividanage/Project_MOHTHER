<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">


        <h1 class="content_h1">Welcome, <?php if(isset($_SESSION['clinicattendee_id'])){
            echo explode(" ", $_SESSION['clinicattendee_name'])[0];
            } else {
                echo 'Guest';
            }
        ?>
        </h1>

        <br> <br>
        <div class="bg_index">
            <!-- <img src="<?php echo URLROOT;?>/img/l.jpg" alt="iii"> -->


            <br>


            <h2>Overview</h2>

            <div class="row_CA">

                <div class="dashboard_CA">
                    <h4>Next Clinic Date</h4> <br>
                    <div class="">
                        Monthly Clinic

                        <br><br>
                        Date: 2022/05/03

                        <br>
                        <div>
                            <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_mothlyclinic"><button
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
                            <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_vaccination"><button
                                    class="reserve_btn">Reserve</button></a>
                        </div>
                    </div>
                </div>


                <div class="dashboard_CA">
                    <h4>Children</h4>

                    <table>
                        <thead>
                            <tr>
                                <th>Register number</th>
                                <th>Name</th>
                                <th></th>


                            </tr>
                        </thead>



                        <tbody>
                            <?php foreach($data['children'] as $children) : ?>
                            <tr>
                                <td><?php echo $children->child_id; ?></td>
                                <td><?php echo $children->name; ?></td>

                                <!-- <td colspan=2> <a href="</?php echo URLROOT; ?>/clinicattendees/particular_child"><button
                                            class="go_btn">Go</button></a>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- <td colspan=2> <a href="</?php echo URLROOT; ?>/clinicattendees/particular_child"><button
                                    class="go_btn">Go</button></a>
                        </td> -->



                    </table>

                    <br>
                    <br>
                    <!-- <div class="">
                    Charts
                    <a href="<//?php echo URLROOT; ?>/clinicattendees/chart"><button class="reserve_btn"><b>Take
                                a
                                look</b></button></a>


                    <br><br>
                    Vaccination

                    <a href="<//?php echo URLROOT; ?>/children/vaccination"><button class="reserve_btn"><b>Take
                                a
                                look</b></button></a>

                </div> -->




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
                            <th>BMI</th>
                            <th>Blood Pressure</th>
                            <th>Weight Gain</th>

                            <!-- <th>Sugar/Albumin</th> -->

                            <!-- <th>Medications</th>
                        <th>Calcium</th>
                        <th>Antimarial Drugs</th>
                        <th>Triposha</th>
                        <th>Iron/Forlate</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td colspan=2><a href="<?php echo URLROOT; ?>/clinicattendees/report"><button
                                        class="more_btn"><b>More</b></button></a></td>


                        </tr>







                    </tbody>
                </table>



                <!-- <table>




                <tr>
                    <td>Weight</td>
                    <td>
                        <//?php echo $data['report']->weight; ?>
                    </td>
                </tr>



                <tr>
                    <td>height</td>
                    <td>
                        <//?php echo $data['report']->height; ?>
                    </td>
                </tr>


                <tr>
                    <td>BMI</td>
                    <td>
                        <//?php echo $data['report']->bmi; ?>
                    </td>
                </tr>


                <tr>
                    <td>Blood Pressure</td>
                    <td>
                        <//?php echo $data['report']->bloodPressure; ?>
                    </td>
                </tr>




            </table> -->







            </div>

        </div>


        <?php require APPROOT . '/views/inc/footer.php'; ?>