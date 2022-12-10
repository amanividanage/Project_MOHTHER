<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>


    <section class="section1">
        <div class="container_register">

            <div class="reg_head">
                <h2>REGISTRATION</h2>
                <br>
            </div>
            <!-- <p>Please enter your details to register</p> -->


            <div class="reg_img"><img src="../img/mom2.jpg" alt=""></div>


            <div class="row">




                <div class="dashboard_register">



                    <form action="<?php echo URLROOT; ?>/clinicattendees/register_1" method="post">

                        <h4> Father's and other details</h4>
                        <br> <br>

                        <div>
                            <label for="hname">Name(Ex:P.P.Fernando): <sup>*</sup></label>
                            <input type="text" name="hname" placeholder="Enter name here...">
                            <span class="form-err"><?php echo $data['hname_err']; ?></span>
                        </div>
                        <div>
                            <label for="hage">Age: <sup>*</sup></label>
                            <input type="text" name="hage" placeholder="Enter age here...">
                            <span class="form-err"><?php echo $data['hage_err']; ?></span>
                        </div>
                        <div>
                            <label for="hlevelofeducation">Level of Education: <sup>*</sup></label>
                            <select name="hlevelofeducation" id="hlevelofeducation">
                                <option value="">Select Your level of Eduction</option>
                                <option value="O/L">O/L</option>
                                <option value="A/L">A/L</option>
                                <option value="Higher education">Higher education</option>
                            </select>
                            <span class="form-err"><?php echo $data['hlevelofeducation_err']; ?></span>
                        </div>
                        <div>
                            <label for="hoccupation">Occupation: <sup>*</sup></label>
                            <input type="text" name="hoccupation" placeholder="Enter occupation here...">
                            <span class="form-err"><?php echo $data['hoccupation_err']; ?></span>
                        </div>
                        <div>
                            <label for="hcontactno">Contact no: <sup>*</sup></label>
                            <input type="text" name="hcontactno" placeholder="Enter contact no here...">
                            <span class="form-err"><?php echo $data['hcontactno_err']; ?></span>
                        </div>
                        <div>
                            <label for="hemail">E-mail: <sup>*</sup></label>
                            <input type="email" name="hemail" placeholder="Enter e-mail here...">
                            <span class="form-err"><?php echo $data['hemail_err']; ?></span>
                        </div>
                        <div>
                            <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                            <select name="gnd" id="gnd">
                                <option value="" selected hidden>Grama Niladhari division</option>
                                <option value="GND-1">GND-1</option>
                                <option value="GND-2">GND-2</option>
                                <option value="GND-3">GND-3</option>
                                <option value="GND-4">GND-4</option>
                            </select>
                            <span class="form-err"><?php echo $data['gnd_err']; ?></span>
                        </div>
                        <div>
                            <label for="phm">PHM Area: <sup>*</sup></label>
                            <select name="phm" id="phm">
                                <option value="">Select Public Health Midwife Area</option>
                                <option value="North">North</option>
                                <option value="South">South</option>
                                <option value="East">East</option>
                                <option value="West">West</option>
                            </select>
                            <span class="form-err"><?php echo $data['phm_err']; ?></span>
                        </div>
                        <div>
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="text" name="password" placeholder="Enter password here...">
                            <span class="form-err"><?php echo $data['password_err']; ?></span>
                        </div>


                        <div>
                            Choose Appointment date

                            <br><input type="date">
                        </div>


                        <div>

                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                            <input type="submit" value="Submit">
                        </div>


                        <div class="loginbtn">
                            <a href="<?php echo URLROOT; ?>/clinicattendees/register_1" class="back"><input
                                    type="submit" value="Next"></a>
                        </div>

                    </form>
                </div>


            </div>



    </section>



    <?php require APPROOT . '/views/inc/footer.php'; ?>