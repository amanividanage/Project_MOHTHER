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
                <h2>Add Mother/Parent/Guardian to Add Child</h2>
                <p>Please enter mother/parent/guardian's information to add child</p>
            
                <!--h4>Relationship to the Child: <sup>*</sup></h4-->

                <!--label for="mother">Mother:</label> 
                <input type="checkbox" id="mother" onclick="myFunction1()">

                <label for="father">Father:</label> 
                <input type="checkbox" id="father" onclick="myFunction2()">

                <label for="guardian">Guardian:</label> 
                <input type="checkbox" id="guardian" onclick="myFunction3()"-->

                <form action="<?php echo URLROOT; ?>/childrens/parent" method="post">

                    <label for="relationship">Relationship to the Chlid:</label>
                    <input type="radio" name="relationship" id="mother" value="Mother" onclick="myFunction1()">Mother
                    <input type="radio" name="relationship" id="father" value="Father" onclick="myFunction2()">Father
                    <input type="radio" name="relationship" id="guardian" value="Guardian" onclick="myFunction3()">Guardian
                    <span class="form-err"><?php echo $data['relationship_err']; ?></span>

                    <h4>Basic details</h4>
                    <div>
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" placeholder="Enter name here...">
                        <span class="form-err"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div>
                        <label for="nic">ID No: <sup>*</sup></label>
                        <input type="text" name="nic" placeholder="Enter ID no here...">
                        <span class="form-err"><?php echo $data['nic_err']; ?></span>
                    </div>
                    <div>
                        <label for="age">Age: <sup>*</sup></label>
                        <input type="text" name="age" placeholder="Enter age here...">
                        <span class="form-err"><?php echo $data['age_err']; ?></span>
                    </div>
                    <div>
                        <label for="nochildren">No of children: <sup>*</sup></label>
                        <input type="text" name="nochildren" placeholder="Enter no of children here...">
                        <span class="form-err"><?php echo $data['nochildren_err']; ?></span>
                    </div>
                    <div>
                        <label for="levelofeducation">Level of Education: <sup>*</sup></label>
                        <select name="levelofeducation" id="levelofeducation">
                            <option value="">Select level of Eduction</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Higher education">Higher education</option>
                        </select>
                        <span class="form-err"><?php echo $data['levelofeducation_err']; ?></span>
                    </div>
                    <div>
                        <label for="occupation">Occupation: <sup>*</sup></label>
                        <input type="text" name="occupation" placeholder="Enter occupation here...">
                        <span class="form-err"><?php echo $data['occupation_err']; ?></span>
                    </div>
                    <div>
                        <label for="contactno">Contact No: <sup>*</sup></label>
                        <input type="text" name="contactno" placeholder="Enter contact no here...">
                        <span class="form-err"><?php echo $data['contactno_err']; ?></span>
                    </div>
                    <div>
                        <label for="address">Address: <sup>*</sup></label>
                        <input type="text" name="address" placeholder="Enter address here...">
                        <span class="form-err"><?php echo $data['address_err']; ?></span>
                    </div>
                    <div>
                        <label for="email">E-mail: <sup>*</sup></label>
                        <input type="email" name="email" placeholder="Enter email here...">
                        <span class="form-err"><?php echo $data['email_err']; ?></span>
                    </div>
                    
                    <h4>Other details</h4>
                    <div>
                        <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                        <input type="text" name="gnd" value="<?php echo $data['gnd']->gnd; ?>">
                        
                    </div> 
                    <div>
                        <label for="phm">PHM Area: <sup>*</sup></label>
                        <input type="text" name="phm" value="<?php echo $data['phm']->phm; ?>">
                        
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

       <script src="<?php echo URLROOT ; ?>/js/midwife_children.js"></script> 
<?php require APPROOT . '/views/inc/footer.php'; ?>