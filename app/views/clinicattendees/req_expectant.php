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
                <h2 class="content_h1">Edit the details inorder to Requst a Re-registration as a Expectant Mother</h2>

                <hr class="line">
            </div>

            <form class="edit_expectant" action="<?php echo URLROOT; ?>/clinicattendees/req_expectant" method="post">
                <!-- class="modal-content animate" -->
                <div class="expectant_info">
                    <div class="container_req_expectant">
                        <div class="card_req_expectant">
                            <br>
                            <label for="mname"><b> Name</b></label>
                            <input type="text" name="mname" value='<?php echo $data['req_expectant']->mname; ?>' required>
                            <span class="form-err"><?php echo $data['mname_err']; ?></span>

                            <label for="mage"><b> Age</b></label>
                            <input type="text" name="mage" value='<?php echo $data['req_expectant']->mage; ?>' required>
                            <span class="form-err"><?php echo $data['mage_err']; ?></span>

                            <!-- <label for="gravidity"><b> Gravidity</b></label>
                            <input type="text" name="gravidity" value='<!?php echo $data['req_expectant']->gravidity; ?>' required>
                            <span class="form-err"><!?php echo $data['gravidity_err']; ?></span> -->

                            <label for="moccupation"><b>Occupation</b></label>
                            <input type="text" name="moccupation" value='<?php echo $data['req_expectant']->moccupation; ?>' required>
                            <span class="form-err"><?php echo $data['moccupation_err']; ?></span>

                            <label for="mcontactno"><b>Contact No</b></label>
                            <input type="text" name="mcontactno" value='<?php echo $data['req_expectant']->mcontactno; ?>' required>
                            <span class="form-err"><?php echo $data['mcontactno_err']; ?></span>

                            <label for="memail"><b>E-mail</b></label>
                            <input type="text" name="memail" value='<?php echo $data['req_expectant']->memail; ?>' required>
                            <span class="form-err"><?php echo $data['memail_err']; ?></span>
                            <br><br><br><br><br>

                        </div>


                        <!-- vvvvv -->

                        <div class="card_req_expectant">
                            <br>
                            <label for="hname"><b>Husbund's name</b></label>
                            <input type="text" name="hname" value='<?php echo $data['req_expectant']->hname; ?>' required>
                            <span class="form-err"><?php echo $data['hname_err']; ?></span>

                            <label for="hage"><b>Husbund's age</b></label>
                            <input type="text" name="hage" value='<?php echo $data['req_expectant']->hage; ?>' required>
                            <span class="form-err"><?php echo $data['hage_err']; ?></span>

                            <label for="hoccupation"><b>Husbund's occupation</b></label>
                            <input type="text" name="hoccupation" value='<?php echo $data['req_expectant']->hoccupation; ?>' required>
                            <span class="form-err"><?php echo $data['hoccupation_err']; ?></span>

                            <label for="hcontactno"><b>Husbund's Contact No</b></label>
                            <input type="text" name="hcontactno" value='<?php echo $data['req_expectant']->hcontactno; ?>' required>
                            <span class="form-err"><?php echo $data['hcontactno_err']; ?></span>

                            <label for="hemail"><b>Husbund's E-mail</b></label>
                            <input type="text" name="hemail" value='<?php echo $data['req_expectant']->hemail; ?>' required>
                            <span class="form-err"><?php echo $data['hemail_err']; ?></span>

                            <br><br>
                            <button type="submit">Submit</button>

                        </div>
                    </div>



                </div>
            </form>
        </div>


    </div>

    <script src="<?php echo URLROOT ; ?>/js/clinicattendee.js"></script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>