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
        <div class="content">
            
            
            <div class="container_new">
                <h2>Register</h2>
                <p>Please enter your details to register</p>
            
                <h4>Mother's details</h4>
                <form action="<?php echo URLROOT; ?>/clinicattendees/register" method="post">
                    <div>
                        <label for="mname">Name: <sup>*</sup></label>
                        <input type="text" name="mname" placeholder="Enter your name here...">
                        <span class="form-err"><?php echo $data['mname_err']; ?></span>
                    </div>
                    <div>
                        <label for="nic">ID No: <sup>*</sup></label>
                        <input type="text" name="nic" placeholder="Enter your ID no here...">
                        <span class="form-err"><?php echo $data['nic_err']; ?></span>
                    </div>
                    <div>
                        <label for="mage">Age: <sup>*</sup></label>
                        <input type="text" name="mage" placeholder="Enter your age here...">
                        <span class="form-err"><?php echo $data['mage_err']; ?></span>
                    </div>
                    <div>
                        <label for="gravidity">Gravidity: <sup>*</sup></label>
                        <input type="text" name="gravidity" placeholder="Enter your no of pregnancies here...">
                        <span class="form-err"><?php echo $data['gravidity_err']; ?></span>
                    </div>
                    <div>
                        <label for="mlevelofeducation">Level of Education: <sup>*</sup></label>
                        <select name="mlevelofeducation" id="mlevelofeducation">
                            <option value="">Select Your level of Eduction</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Higher education">Higher education</option>
                        </select>
                        <span class="form-err"><?php echo $data['mlevelofeducation_err']; ?></span>
                    </div>
                    <div>
                        <label for="moccupation">Occupation: <sup>*</sup></label>
                        <input type="text" name="moccupation" placeholder="Enter your occupation here...">
                        <span class="form-err"><?php echo $data['moccupation_err']; ?></span>
                    </div>
                    <div>
                        <label for="mcontactno">Contact No: <sup>*</sup></label>
                        <input type="text" name="mcontactno" placeholder="Enter your contact no here...">
                        <span class="form-err"><?php echo $data['mcontactno_err']; ?></span>
                    </div>
                    <div>
                        <label for="address">Address: <sup>*</sup></label>
                        <input type="text" name="address" placeholder="Enter your address here...">
                        <span class="form-err"><?php echo $data['address_err']; ?></span>
                    </div>
                    <div>
                        <label for="memail">E-mail: <sup>*</sup></label>
                        <input type="email" name="memail" placeholder="Enter your email here...">
                        <span class="form-err"><?php echo $data['memail_err']; ?></span>
                    </div>
                    <br>
                    <h4>Father's details</h4>
                    <div>
                        <label for="hname">Name: <sup>*</sup></label>
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
                    <h4>Other details</h4>
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
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>