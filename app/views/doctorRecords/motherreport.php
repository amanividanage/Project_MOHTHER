<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_doctor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_doctor.php' ; ?>
    <div class="content">
    
        <a href="<?php echo URLROOT; ?>/doctorRecords/expectantmothers" class="back"><i class="fa fa-backward"></i>  Back</a>
            <br>
            <div class="report">
                <h2 class="content_h1">Expectant Mother profile - <?php echo $data['mother']->name; ?></h2>
                <!-- <a href="<!?php echo URLROOT; ?>/childrens/add/<!?php echo $data['mother']->nic; ?>"><button class="add">Add Child</button></a>  -->
            </div>

            <div class="container_new">
                <h2>Add Report of the Mother</h2>
                <p>Please enter mother's monthly reports</p>

                <form action="<?php echo URLROOT; ?>/doctorRecords/motherreport/<?php echo $data['mother']->nic; ?>" method="post">

            
                    <div>
                        <label for="pallor">Pallor : <sup>*</sup></label>
                        <input type="text" name="pallor" placeholder="Enter iyou notice having pallor..." value="<?php echo $data['pallor']; ?>">
                        <span class="form-err"><?php echo $data['pallor_err']; ?></span>
                    </div>
                    <div>
                        <label for="fhs">Foetal Heart Surveillance : <sup>*</sup></label>
                        <select name="fhs" id="fhs" value="<?php echo $data['fhs']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['fhs_err']; ?></span>
                    </div>
                    <div>
                        <label for="fm">Fetal Movement : <sup>*</sup></label>
                        <select name="fm" id="fm" value="<?php echo $data['fm']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['fm_err']; ?></span>
                    </div>
                    <div>
                        <label>Oedema: </label> <br/>
                        <label for="ankle">Ankle : </label>
                        <select name="ankle" id="ankle" value="<?php echo $data['ankle']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['ankle_err']; ?></span>

                        <label for="facial">Facial: </label>
                        <select name="facial" id="facial" value="<?php echo $data['facial']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['facial_err']; ?></span>
                    </div>
                    <div>
                        <label for="delivary">Expectant Date of delivary : <sup>*</sup></label>
                        <input type="text" name="delivary" placeholder="Enter expectant date of delivary" value="<?php echo $data['delivary']; ?>">
                        <span class="form-err"><?php echo $data['delivary_err']; ?></span>
                    </div>
                    
                    
                    
                    <input type="submit" value="Submit">

                     





                    
                </form>
                
            </div>
            

            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


