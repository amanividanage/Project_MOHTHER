<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife_children.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
        <div class="content">
            
        <div class="container_new">
                <h2>Add Child</h2>
                <p>Please enter child's information to add child</p>
            
                <!--h4>Relationship to the Child: <sup>*</sup></h4-->

                <!--label for="mother">Mother:</label> 
                <input type="checkbox" id="mother" onclick="myFunction1()">

                <label for="father">Father:</label> 
                <input type="checkbox" id="father" onclick="myFunction2()">

                <label for="guardian">Guardian:</label> 
                <input type="checkbox" id="guardian" onclick="myFunction3()"-->

                <form action="<?php echo URLROOT; ?>/childrens/add" method="post">

                    <label for="relationship">Relationship to the Chlid:</label>
                    <input type="radio" name="relationship" id="mother" value="Mother" onclick="myFunction1()">Mother
                    <input type="radio" name="relationship" id="father" value="Father" onclick="myFunction2()">Father
                    <input type="radio" name="relationship" id="guardian" value="Guardian" onclick="myFunction3()">Guardian
                    <span class="form-err"><?php echo $data['relationship_err']; ?></span>

                    <h4>Basic details</h4>
                    <div>
                        <label for="mname">Name: <sup>*</sup></label>
                        <input type="text" name="mname" placeholder="Enter mother's name here...">
                        <span class="form-err"><?php echo $data['mname_err']; ?></span>
                    </div>
                    <div>
                        <label for="mnic">ID No: <sup>*</sup></label>
                        <input type="text" name="mnic" placeholder="Enter mother's ID no here...">
                        <span class="form-err"><?php echo $data['mnic_err']; ?></span>
                    </div>
                    <div>
                        <label for="mage">Age: <sup>*</sup></label>
                        <input type="text" name="mage" placeholder="Enter mother's age here...">
                        <span class="form-err"><?php echo $data['mage_err']; ?></span>
                    </div>
                    <div>
                        <label for="mnochildren">No of children: <sup>*</sup></label>
                        <input type="text" name="mnochildren" placeholder="Enter no of children here...">
                        <span class="form-err"><?php echo $data['mnochildren_err']; ?></span>
                    </div>
                    <div>
                        <label for="mlevelofeducation">Level of Education: <sup>*</sup></label>
                        <select name="mlevelofeducation" id="mlevelofeducation">
                            <option value="">Select mother's level of Eduction</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Higher education">Higher education</option>
                        </select>
                        <span class="form-err"><?php echo $data['mlevelofeducation_err']; ?></span>
                    </div>
                    <div>
                        <label for="moccupation">Occupation: <sup>*</sup></label>
                        <input type="text" name="moccupation" placeholder="Enter mother's occupation here...">
                        <span class="form-err"><?php echo $data['moccupation_err']; ?></span>
                    </div>
                    <div>
                        <label for="mcontactno">Contact No: <sup>*</sup></label>
                        <input type="text" name="mcontactno" placeholder="Enter mother's contact no here...">
                        <span class="form-err"><?php echo $data['mcontactno_err']; ?></span>
                    </div>
                    <div>
                        <label for="maddress">Address: <sup>*</sup></label>
                        <input type="text" name="maddress" placeholder="Enter mother's address here...">
                        <span class="form-err"><?php echo $data['maddress_err']; ?></span>
                    </div>
                    <div>
                        <label for="memail">E-mail: <sup>*</sup></label>
                        <input type="email" name="memail" placeholder="Enter mother's email here...">
                        <span class="form-err"><?php echo $data['memail_err']; ?></span>
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
                        <input type="submit" href="<?php echo URLROOT; ?>/childrens/parentlist" value="Submit">
                    </div>
                </form>
            </div>
            
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>