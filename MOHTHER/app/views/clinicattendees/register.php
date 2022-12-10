<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>

    <div class="content_register">
        <section class="section1">
            <div class="container_register">

                <div class="reg_head">
                    <h2 id="opening">REGISTRATION</h2>
                    <br>
                </div>
                <!-- <p>Please enter your details to register</p> -->


                <div class="reg_img"><img src="../img/mom2.jpg" alt=""></div>


                <div class="row">




                    <div class="dashboard_register">



                        <form action="<?php echo URLROOT; ?>/clinicattendees/register" method="post">

                            <h4> Mother's details</h4>
                            <br> <br>

                            <div class="details">
                                <label for="mname">Name(Ex:P.P.Fernando): <sup>*</sup></label>
                                <br>
                                <input type="text" name="mname" placeholder="Enter your name here...">
                                <br>
                                <span class="form-err"><?php echo $data['mname_err']; ?></span>
                            </div>

                            <br> <br>

                            <div class="details">
                                <label for="nic">NIC No: <sup>*</sup></label>
                                <br>
                                <input type="text" name="nic" placeholder="Enter your NIC here...">
                                <br>
                                <span class="form-err"><?php echo $data['nic_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">
                                <label for="mage">Age: <sup>*</sup></label>
                                <br>
                                <input type="text" name="mage" placeholder="Enter your age here...">
                                <br>
                                <span class="form-err"><?php echo $data['mage_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">
                                <label for="gravidity">Gravidity: <sup>*</sup></label>
                                <br>
                                <input type="text" name="gravidity" placeholder="Enter your no of pregnancies here...">
                                <br>
                                <span class="form-err"><?php echo $data['gravidity_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">
                                <label for="mlevelofeducation">Level of Education: <sup>*</sup></label>
                                <br>
                                <select name="mlevelofeducation" id="mlevelofeducation">
                                    <option value="">Select Your level of Eduction</option>
                                    <option value="O/L">O/L</option>
                                    <option value="A/L">A/L</option>
                                    <option value="Higher education">Higher education</option>
                                </select>
                                <br>
                                <span class="form-err"><?php echo $data['mlevelofeducation_err']; ?></span>
                            </div>
                            <br> <br>


                            <div class="details">
                                <label for="moccupation">Occupation: <sup>*</sup></label>
                                <br>
                                <input type="text" name="moccupation" placeholder="Enter your occupation here...">
                                <br>
                                <span class="form-err"><?php echo $data['moccupation_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">

                                <label for="mcontactno">Contact No: <sup>*</sup></label>
                                <br>
                                <input type="text" name="mcontactno" placeholder="Enter your contact no here...">
                                <br>
                                <span class="form-err"><?php echo $data['mcontactno_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">
                                <label for="address">Address: <sup>*</sup></label>
                                <br>
                                <input type="text" name="address" placeholder="Enter your address here...">
                                <br>
                                <span class="form-err"><?php echo $data['address_err']; ?></span>
                            </div>
                            <br> <br>
                            <div class="details">
                                <label for="memail">E-mail: <sup>*</sup></label>
                                <br>
                                <input type="email" name="memail" placeholder="Enter your email here...">
                                <br>
                                <span class="form-err"><?php echo $data['memail_err']; ?></span>
                            </div>
                            <br> <br>

                            <!-- <div class="loginbtn">


                            <a href="</?php echo URLROOT; ?>/clinicattendees" class="back"> <input type="submit"
                                    value="Next"></a>
                        </div> -->


                            <a href="#opening1">Click here to go down</a>

                            <br><br>



                        </form>



                    </div>


                    <div class="break1">
                        <div class="complete_firstphase">
                            <!-- <img src="../img/h.jpeg" alt="Snow"> -->

                            <p class="centered" id="opening1">Only one more step to complete registration</p>

                            <br>


                        </div>


                    </div>
                    <a href="#opening2">Go to next step</a>
                    <br> <br> <br> <br>

                </div>






            </div>






        </section>





    </div>




    <section class=" section2">



        <!-- <p>Please enter your details to register</p> -->


        <div class="reg_img1"><img src="../img/mom2.jpg" alt=""></div>


        <div class="row1">


            <div class="dashboard_register1">



                <form action="<?php echo URLROOT; ?>/clinicattendees/register" method="post">

                    <h4 id="opening2"> Father's and other details</h4>
                    <br> <br>

                    <div class="details1">
                        <label for=" hname">Name(Ex:P.P.Fernando): <sup>*</sup></label>
                        <br>
                        <input type="text" name="hname" placeholder="Enter name here...">
                        <span class="form-err"><?php echo $data['hname_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="hage">Age: <sup>*</sup></label>
                        <br>
                        <input type="text" name="hage" placeholder="Enter age here...">
                        <span class="form-err"><?php echo $data['hage_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="hlevelofeducation">Level of Education: <sup>*</sup></label>
                        <br>
                        <select name="hlevelofeducation" id="hlevelofeducation">
                            <option value="">Select Your level of Eduction</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Higher education">Higher education</option>
                        </select>
                        <span class="form-err"><?php echo $data['hlevelofeducation_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="hoccupation">Occupation: <sup>*</sup></label>
                        <br>
                        <input type="text" name="hoccupation" placeholder="Enter occupation here...">
                        <span class="form-err"><?php echo $data['hoccupation_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="hcontactno">Contact no: <sup>*</sup></label>
                        <br>
                        <input type="text" name="hcontactno" placeholder="Enter contact no here...">
                        <span class="form-err"><?php echo $data['hcontactno_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="hemail">E-mail: <sup>*</sup></label>
                        <br>
                        <input type="email" name="hemail" placeholder="Enter e-mail here...">
                        <span class="form-err"><?php echo $data['hemail_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                        <br>
                        <select name="gnd" id="gnd">
                            <option value="" selected hidden>Grama Niladhari division</option>
                            <option value="GND-1">GND-1</option>
                            <option value="GND-2">GND-2</option>
                            <option value="GND-3">GND-3</option>
                            <option value="GND-4">GND-4</option>
                        </select>
                        <span class="form-err"><?php echo $data['gnd_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="phm">PHM Area: <sup>*</sup></label>
                        <br>
                        <select name="phm" id="phm">
                            <option value="">Select Public Health Midwife Area</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                        </select>
                        <span class="form-err"><?php echo $data['phm_err']; ?></span>
                    </div>
                    <br><br>
                    <div class="details1">
                        <label for="password">Password: <sup>*</sup></label>
                        <br>
                        <input type="text" name="password" placeholder="Enter password here...">
                        <span class="form-err"><?php echo $data['password_err']; ?></span>
                    </div>
                    <br><br>

                    <div class="details1">
                        <br>
                        Choose Appointment date

                        <br><input type="date">
                    </div>


                    <div class="reg_sub">

                        <br> <br> <br> <br> <br>
                        <div>
                            <input type="submit" value="Submit">
                        </div>
                        <!-- <input type="submit" value="Submit"> -->
                    </div>


                    <!-- <div class="loginbtn">
                    <a href="</?php echo URLROOT; ?>/clinicattendees/register_1" class="back"><input type="submit"
                        value="Next"></a>
                       </div> -->
                    <a href="#opening">Top</a>
                </form>
                <!-- <div class="reg_img"><img src="../img/mom2.jpg" alt=""></div> -->
            </div>

        </div>




    </section>



    <?php require APPROOT . '/views/inc/footer.php'; ?>