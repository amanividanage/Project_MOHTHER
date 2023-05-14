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
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>


    <div class="container_new1">
        <br> <br> <br> <br> 
        <h2>R E G I S T R A T I O N</h2>
        <br>
        <!-- <p>Please enter your details to register</p> > -->
        <br>

        <div class="makeflex">

        
        <form action="<?php echo URLROOT; ?>/clinicattendees/register" method="post">
            <div class="register_CA">
                <h4>Mother's details</h4>

                <br>
                <!--"class="user-details"-->
                <div class="input-box">
                    <label for="mname">Name: <sup>*</sup></label>
                    <input type="text" name="mname"  class= "form <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mname']; ?>" placeholder="Enter your name here...">
                    <span class="form-err"><?php echo $data['mname_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="nic">ID No: <sup>*</sup></label>
                    <input type="text" maxlength="12" name="nic" class= "form <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nic']; ?>" placeholder="Enter your ID no here...">
                    <span class="form-err"><?php echo $data['nic_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="mage">Age: <sup>*</sup></label>
                    <input type="text" maxlength="2"  name="mage" class= "form <?php echo (!empty($data['mage_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mage']; ?>"placeholder="Enter your age here...">
                    <span class="form-err"><?php echo $data['mage_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="mlevelofeducation">Level of Education: <sup>*</sup></label>
                    <select name="mlevelofeducation" id="mlevelofeducation">
                        <option value="">Select Your level of Education</option>
                        <option value="O/L">O/L</option>
                        <option value="A/L">A/L</option>
                        <option value="Higher education">Higher education</option>
                    </select>

                    <span class="form-err"><?php echo $data['mlevelofeducation_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="moccupation">Occupation: <sup>*</sup></label>
                    <input type="text" name="moccupation" class= "form <?php echo (!empty($data['moccupation_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['moccupation']; ?>" placeholder="Enter your occupation here...">
                    <span class="form-err"><?php echo $data['moccupation_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="mcontactno">Contact No: <sup>*</sup></label>
                    <input type="text" name="mcontactno" class= "form <?php echo (!empty($data['mcontactno_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mcontactno']; ?>" placeholder="Enter your contact no here...">
                    <span class="form-err"><?php echo $data['mcontactno_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="address">Address: <sup>*</sup></label>
                    <input type="text" maxlength="50"  name="address" class= "form <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>" placeholder="Enter your address here...">
                    <span class="form-err"><?php echo $data['address_err']; ?></span>
                </div>
                <div class="input-box">
                    <label for="memail">E-mail: <sup>*</sup></label>
                    <input type="email" name="memail" class= "form <?php echo (!empty($data['memail_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['memail']; ?>" placeholder="Enter your email here...">
                    <span class="form-err"><?php echo $data['memail_err']; ?></span>
                </div>

            </div>



            <div class="register_CA">
                <h4>Father's details</h4>
                <br>
                <div class="input-box">
                    <label for="hname">Name: </label>
                    <input type="text" name="hname" placeholder="Enter name here...">
                    <!-- <span class="form-err"><!?php echo $data['hname_err']; ?></span> -->
                </div>
                <div class="input-box">
                    <label for="hage">Age: </label>
                    <input type="text" maxlength="2"  name="hage" placeholder="Enter age here...">
                    <!-- <span class="form-err"><!?php echo $data['hage_err']; ?></span> -->
                </div>
                <div class="input-box">
                    <label for="hlevelofeducation">Level of Education: </label>
                    <select name="hlevelofeducation" id="hlevelofeducation">
                        <option value="">Select Your level of Eduction</option>
                        <option value="O/L">O/L</option>
                        <option value="A/L">A/L</option>
                        <option value="Higher education">Higher education</option>
                    </select>
                    <!-- <span class="form-err"><!?php echo $data['hlevelofeducation_err']; ?></span> -->
                </div>
                <div class="input-box">
                    <label for="hoccupation">Occupation: </label>
                    <input type="text" name="hoccupation" placeholder="Enter occupation here...">
                    <!-- <span class="form-err"><!?php echo $data['hoccupation_err']; ?></span> -->
                </div>
                <div class="input-box">
                    <label for="hcontactno">Contact no: </label>
                    <input type="text" maxlength="10"  name="hcontactno" placeholder="Enter contact no here...">
                    <!-- <span class="form-err"><!?php echo $data['hcontactno_err']; ?></span> -->
                </div>
                <div class="input-box">
                    <label for="hemail">E-mail: </label>
                    <input type="email" name="hemail" placeholder="Enter e-mail here...">
                    <!-- <span class="form-err"><!?php echo $data['hemail_err']; ?></span> -->
                </div>


                <br>

                <h4>Other details</h4>
                <br>

                <div class="input-box">
                    <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                    <select name="gnd" id="gnd">
                        <option value="" selected hidden>Grama Niladhari division</option>
                        <option value="Kalalgoda">Kalalgoda</option>
                        <option value="Thalawathugoda West">Thalawathugoda West</option>
                        <option value="Thalawathugoda East">Thalawathugoda East</option>
                        <option value="Kottawa South">Kottawa South</option>
                        <option value="Kottawa East">Kottawa East</option>
                        <option value="Kottawa City">Kottawa City</option>
                        <option value="Kottawa North">Kottawa North</option>
                        <option value="Kottawa  West">Kottawa  West</option>
                        <option value="Liyanagoda">Liyanagoda</option>
                        <option value="Pragathipura">Pragathipura</option>
                    </select>
                    <span class="form-err"><?php echo $data['gnd_err']; ?></span>
                </div>
                <!-- <div class="input-box">
                        <label for="phm">PHM Area: <sup>*</sup></label>
                        <select name="phm" id="phm">
                            <option value="">Select Public Health Midwife Area</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                        </select>
                        <span class="form-err"></?php echo $data['phm_err']; ?></span>
                    </div> -->
                <!-- <div class="input-box">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="text" name="password" placeholder="Enter password here...">
                        <span class="form-err"></?php echo $data['password_err']; ?></span>
                    </div> -->

                    <br>
                <div class="input-box">
                    <input type="submit" value="Submit">
                    <br> <br> <br>
                </div>

            </div>

        </form>
        </div>

    </div>


    <?php require APPROOT . '/views/inc/footer.php'; ?>
    <script src="<?= URLROOT ?>/js/newjs.js"></script>
    <!-- <script>
  var submitButton = document.getElementById("submit");
  submitButton.addEventListener("click", function() {
    var nic = document.getElementById("nic").value;
    // Use the value of 'nic' to make the AJAX request
  });
</script> -->