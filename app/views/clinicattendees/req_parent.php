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
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <!-- <a href="</?php echo URLROOT; ?>/clinicattendees/profile"><button class="back_btn">Back</button></a> -->
        <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees/profile"><i class="fa fa-chevron-left"></i></a>
        <br> <br>
        <div>
            <div>
                <h2 class="content_h1">You can edit the details</h2>
                <hr class="line">
            </div>

            <form class="edit_expectant" action="<?php echo URLROOT; ?>/clinicattendees/req_parent" method="post">
                <!-- class="modal-content animate" -->
                <div class="expectant_info">
                    <div class="container_req_expectant">
                        <div class="card_req_expectant">

                            <h2 class="content_h1">Mother details</h2>
                           

                            <label for="name"><b>Name</b></label>
                            <input type="text" name="name" id="name" value='<?php echo $data['req_parent']->name; ?>' required>
                            <span class="form-err"><?php echo $data['name_err']; ?></span>

                            <label for="age"><b> Age</b></label>
                            <input type="text" name="age" id="age" value='<?php echo $data['req_parent']->age; ?>' required>
                            <span class="form-err"><?php echo $data['age_err']; ?></span>

                            <label for="nochildren"><b> Number of children</b></label>
                            <input type="text" name="nochildren" id="nochildren" value='<?php echo $data['req_parent']->nochildren; ?>' required>
                            <span class="form-err"><?php echo $data['nochildren_err']; ?></span>

                            <label for="occupation"><b>Occupation</b></label>
                            <input type="text" name="occupation" id="occupation" value='<?php echo $data['req_parent']->occupation; ?>' required>
                            <span class="form-err"><?php echo $data['occupation_err']; ?></span>

                            <label for="contactno"><b>Contactno</b></label>
                            <input type="text" name="contactno" id="contactno" value='<?php echo $data['req_parent']->contactno; ?>' required>
                            <span class="form-err"><?php echo $data['contactno_err']; ?></span>

                            <label for="email"><b>E-mail</b></label>
                            <input type="text" name="email" id="email" value='<?php echo $data['req_parent']->email; ?>' required>
                            <span class="form-err"><?php echo $data['email_err']; ?></span>
                            
                            <br><br> <br><br><br> <br>
                        </div>


                        <!-- vvvvv -->

                        <div class="card_req_expectant">
                            <h2 class="content_h1">Husband's details</h2>

                            <label for="hname"><b>Name</b></label>
                            <input type="text" placeholder="Enter husbund's name" name="hname" id="hname">
                            <span class="form-err"><?php echo $data['hname_err']; ?></span>

                            <label for="hage"><b>Age</b></label>
                            <input type="text" placeholder="Enter husbund's age" name="hage" id="hage">
                            <span class="form-err"><?php echo $data['hage_err']; ?></span>


                            <label for="hlevelofeducation"><b>Level of education</b></label>
                            <select name="hlevelofeducation" id="hlevelofeducation">
                                <option value="">Select level of Education</option>
                                <option value="O/L">O/L</option>
                                <option value="A/L">A/L</option>
                                <option value="Higher education">Higher education</option>
                            </select>
                            <span class="form-err"><?php echo $data['hlevelofeducation_err']; ?></span>

                            <label for="hoccupation"><b>Occupation</b></label>
                            <input type="text" placeholder="Enter husbund's occupation" name="hoccupation" id="hoccupation">
                            <span class="form-err"><?php echo $data['hoccupation_err']; ?></span>

                            <label for="hcontactno"><b>Contact No</b></label>
                            <input type="text" placeholder="Enter husbund's contact number" name="hcontactno" id="hcontactno">
                            <span class="form-err"><?php echo $data['hcontactno_err']; ?></span>

                            <label for="hemail"><b>E-mail</b></label>
                            <input type="text" placeholder="Enter husbund's E-mail" name="hemail" id="hemail">
                            <span class="form-err"><?php echo $data['hemail_err']; ?></span>


                            <br><br> <br>
                            <button type="submit" class="sub_btn">Submit</button> 
                        </div>
                    </div>



                </div>
            </form>
        </div>


    </div>

    <script src="<?php echo URLROOT ; ?>/js/clinicattendee.js"></script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>