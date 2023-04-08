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
            
        <div class="container_new">
                <h2>Add Report of the child</h2>
                <p>Please enter child's monthly reports</p>

                <form action="<?php echo URLROOT; ?>/doctorRecords/childreport/<?php echo $data['child']->child_id; ?>" method="post">

                    <h4>Info about child growth</h4>
                    <div>
                        <label for="eye1">Eye size difference: <sup>*</sup></label>
                        <input type="text" name="eye1" placeholder="Enter if there any eye size difference..." value="<?php echo $data['eye1']; ?>">
                        <span class="form-err"><?php echo $data['eye1_err']; ?></span>
                    </div>
                    <div>
                        <label for="eye2">Cataract:  <sup>*</sup></label>
                        <select name="eye2" id="eye2" value="<?php echo $data['eye2']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['eye2_err']; ?></span>
                    </div>
                    <div>
                        <label for="eye3">Corneal opacity: <sup>*</sup></label>
                        <select name="eye3" id="eye3" value="<?php echo $data['eye3']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['eye3_err']; ?></span>
                    </div>
                    <div>
                        <label for="eye4">Eye movement disorders: <sup>*</sup></label>
                        <input type="text" name="eye4" placeholder="Enter if there any eye movement disorder..." value="<?php echo $data['eye4']; ?>">
                        <span class="form-err"><?php echo $data['eye4_err']; ?></span>
                    </div>
                    <div>
                        <label>Hearing Disorders: </label> <br/>
                        <label for="leftear">Left ear: </label>
                        <select name="leftear" id="leftear" value="<?php echo $data['leftear']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['leftear_err']; ?></span>

                        <label for="rightear">Right ear: </label>
                        <select name="rightear" id="rightear" value="<?php echo $data['rightear']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['rightear_err']; ?></span>
                    </div>
                    <div>
                        <label>Dental health: </label>
                        <label for="teeth1">White or brown spots: </label>
                        <select name="teeth1" id="teeth1" value="<?php echo $data['teeth1']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['teeth1_err']; ?></span>

                        <label for="teeth2">Dental cavities: </label>
                        <select name="teeth2" id="teeth2" value="<?php echo $data['teeth2']; ?>">
                            <option value="" selected hidden>Select one option</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <span class="form-err"><?php echo $data['teeth2_err']; ?></span>
                    </div>
                    <div>
                        <label for="heart">Heart disease: </label>
                        <input type="text" name="heart" placeholder="Enter if there any heart related disease..." value="<?php echo $data['heart']; ?>">
                        <span class="form-err"><?php echo $data['heart_err']; ?></span>
                    </div>
                    <div>
                        <label for="lungs">Lungs: </label>
                        <input type="text" name="lungs" placeholder="Enter if there any lungs related disease..." value="<?php echo $data['lungs']; ?>">
                        <span class="form-err"><?php echo $data['lungs_err']; ?></span>
                    </div>
                    <div>
                        <label for="hip">Hip joint: </label>
                        <input type="text" name="hip" placeholder="Enter if there any hips related disease..." value="<?php echo $data['hip']; ?>">
                        <span class="form-err"><?php echo $data['hip_err']; ?></span>
                    </div>
                    <div>
                        <label for="other1">Congenital disorders: </label>
                        <input type="text" name="other1" placeholder="Enter if there any Congenital related disease..." value="<?php echo $data['other1']; ?>">
                        <span class="form-err"><?php echo $data['other1_err']; ?></span>
                    </div>
                    <div>
                        <label for="other2">Other medical condition: </label>
                        <input type="text" name="other2" placeholder="Enter other complications of baby if any..." value="<?php echo $data['other2']; ?>">
                        <span class="form-err"><?php echo $data['other2_err']; ?></span>
                    </div>
                    
                    
                    <input type="submit" value="Submit">

                     





                    
                </form>
                
            </div>
            <br>
                <br>
        
        </div>
            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


