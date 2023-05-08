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

                <form action="<?php echo URLROOT; ?>/childrens_expectant/add/<?php echo $data['expectant']->nic; ?>" method="post">

                    <h4>Basic details</h4>
                    <div>
                        <label for="name">Name of the child: <sup>*</sup></label>
                        <input type="text" name="name" placeholder="Enter name here...">
                        <span class="form-err"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div>
                        <label for="dob">Birth Date: <sup>*</sup></label>
                        <input type="date" name="dob" placeholder="Enter date of birth here...">
                        <span class="form-err"><?php echo $data['dob_err']; ?></span>
                    </div>
                    <div>
                        <label for="date">Registration Date: <sup>*</sup></label>
                        <input type="date" name="date" placeholder="Enter registration date here...">
                        <span class="form-err"><?php echo $data['date_err']; ?></span>
                    </div>
                    <div>
                        <label for="hospital">Birth Hospital: <sup>*</sup></label>
                        <input type="text" name="hospital" placeholder="Enter birth hospital here...">
                        <span class="form-err"><?php echo $data['hospital_err']; ?></span>
                    </div>
                    <div>
                        <label for="weight">Birth Weight (in Kg):  <sup>*</sup></label>
                        <input type="text" name="weight" placeholder="Enter birth weight in kg here...">
                        <span class="form-err"><?php echo $data['weight_err']; ?></span>
                    </div>
                    <div>
                        <label for="circumference">Head Circumference at birth (in cm): <sup>*</sup></label>
                        <input type="text" name="circumference" placeholder="Enter head circumference in cm here...">
                        <span class="form-err"><?php echo $data['circumference_err']; ?></span>
                    </div>
                    <div>
                        <label for="length">Length at birth (in cm) : <sup>*</sup></label>
                        <input type="text" name="length" placeholder="Enter length at birth in cm here...">
                        <span class="form-err"><?php echo $data['length_err']; ?></span>
                    </div>
                   
                    <h4>Special Attention Instances</h4>
                    <label>Special Attension instances if any (Optional):</label><br>

                    <input type="checkbox" name="special[]" value="Premature births">Premature births

                    <input type="checkbox" name="special[]" value="Low birth weight">Low birth weight

                    <input type="checkbox" name="special[]" value="Neonatal complications">Neonatal complications

                    <input type="checkbox" name="special[]" value="Congenital disorders">Congenital disorders <br/>
                    
                    <input type="submit" value="Submit">
                    
                </form>
            </div>
            
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>