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




        <h2>Overview</h2>

        <div class="row">

            <div class="dashboard_CA">
                <h4>Next Clinic Date</h4> <br>
                <div class="">
                    Monthly Clinic

                    <br><br>
                    Date: 2022/05/03

                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/vaccination"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>

                <br> <br>

                <div class="">
                    Vaccination

                    <br><br>
                    Date: 2022/05/03

                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/vaccination"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>
            </div>


            <div class="dashboard_CA">
                <h4>Children</h4> <br>

                <!-- <table>
                    <thead>
                        <tr>
                            <th>Register number</th>
                            <th>Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2022/DE/075</td>
                            <td>Joe Teddy</td>

                        </tr>





                    </tbody>
                </table> -->

                <br>

                <div class="">
                    Charts
                    <a href="<?php echo URLROOT; ?>/clinicattendees/vaccination"><button class="reserve_btn"><b>Take
                                a
                                look</b></button></a>


                    <br><br>
                    Vaccination

                    <a href="<?php echo URLROOT; ?>/children/vaccination"><button class="reserve_btn"><b>Take
                                a
                                look</b></button></a>

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
                        <th>Temperature</th>
                        <th>Nature of the umbilicus</th>
                        <th>Medications</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>







                </tbody>
            </table>



        </div>




        <?php require APPROOT . '/views/inc/footer.php'; ?>