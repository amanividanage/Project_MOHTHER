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

            <form class="edit_expectant" action="<?php echo URLROOT; ?>/clinicattendees/req_expectant" method="post">
                <!-- class="modal-content animate" -->
                <div class="expectant_info">
                    <div class="container_req_expectant">
                        <div class="card_req_expectant">
                            <br>
                            <label for="gravidity"><b> Gravidity</b></label>
                            <input type="text" placeholder="Enter new contact number" name="gravidity"
                                value='<?php echo $data['req_expectant']->gravidity; ?>' required>

                            <label for="mcontactno"><b> Your contact No</b></label>
                            <input type="text" placeholder="Enter new contact number" name="mcontactno"
                                value='<?php echo $data['req_expectant']->mcontactno; ?>'>

                            <label for="moccupation"><b> Your occupation</b></label>
                            <input type="text" placeholder="Enter new contact number" name="moccupation"
                                value='<?php echo $data['req_expectant']->moccupation; ?>'>

                            <label for="memail"><b> Your E-mail</b></label>
                            <input type="text" placeholder="Enter new contact number" name="memail"
                                value='<?php echo $data['req_expectant']->memail; ?>'>

                            <label for="hname"><b>Husbund's name</b></label>
                            <input type="text" placeholder="Enter new contact number" name="hname"
                                value='<?php echo $data['req_expectant']->hname; ?>'>

                        </div>


                        <!-- vvvvv -->

                        <div class="card_req_expectant">
                            <br>
                            <label for="hage"><b>Husbund's age</b></label>
                            <input type="text" placeholder="Enter new contact number" name="hage"
                                value='<?php echo $data['req_expectant']->hage; ?>'>


                            <label for="hlevelofeducation"><b>Husbund's levelofeducation</b></label>
                            <!-- <input type="text" placeholder="Enter new contact number" name="hlevelofeducation"
                                value='</?php echo $data['req_expectant']->hlevelofeducation; ?>'> -->

                            <select name="hlevelofeducation" id="hlevelofeducation">
                                <option value="">Select Your level of Education</option>
                                <option value="O/L">O/L</option>
                                <option value="A/L">A/L</option>
                                <option value="Higher education">Higher education</option>
                            </select>

                            <label for="hcontactno"><b>Husbund's Contact No</b></label>
                            <input type="text" placeholder="Enter new contact number" name="hcontactno"
                                value='<?php echo $data['req_expectant']->hcontactno; ?>'>

                            <label for="hoccupation"><b>Husbund's occupation</b></label>
                            <input type="text" placeholder="Enter new contact number" name="hoccupation"
                                value='<?php echo $data['req_expectant']->hoccupation; ?>'>

                            <label for="hemail"><b>Husbund's E-mail</b></label>
                            <input type="text" placeholder="Enter new contact number" name="hemail"
                                value='<?php echo $data['req_expectant']->hemail; ?>'>

                            <button type="submit">Submit</button>

                        </div>
                    </div>



                </div>
            </form>
        </div>


    </div>

    <script src="<?php echo URLROOT ; ?>/js/clinicattendee.js"></script>
    <?php require APPROOT . '/views/inc/footer.php'; ?>