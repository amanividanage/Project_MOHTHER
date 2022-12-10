<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <a href="<?php echo URLROOT; ?>/clinicattendees/profile"><button class="back_btn">Back</button></a>
        <br> <br>
        <h1>Please fill the details</h1>

        <br>

        <div class="request_register">

            <div class="request"> <br>
                <h4>Father's details</h4>
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
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="text" name="password" placeholder="Enter password here...">
                    <span class="form-err"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="re">
                    <!-- <input type="submit" value="Submit"> -->
                    <td><a href="<?php echo URLROOT; ?>/clinicattendees/request_date"><button
                                class="reserve_btn"><b>Submit</b></button></a></td>
                    <br>
                </div>
                </form>






            </div>
        </div>

    </div>



    <?php require APPROOT . '/views/inc/footer.php'; ?>