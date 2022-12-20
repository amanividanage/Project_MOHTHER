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
        <br>
        <a href="<?php echo URLROOT; ?>/clinicattendees/profile"><button class="back_btn">Back</button></a>
        <br> <br>
        <h1>Please fill the details</h1>

        <br>

        <div class="request_register">



            <div class="request">

                <form action="<?php echo URLROOT; ?>/clinicattendees/request" method="post">
                    <h4>Father's details</h4>
                    <div class="line1">

                    </div>

                    <br> <br>
                    <div class="details1">
                        <label for="hname">Name(Ex:P.P.Fernando): <sup>*</sup></label>
                        <input type="text" name="hname" placeholder="Enter name here...">
                        <!-- <span class="form-err"><!?php echo $data['hname_err']; ?></span> -->

                    </div>
                    <div>
                        <br>
                        <label for="hage">Age: <sup>*</sup></label>
                        <input type="text" name="hage" placeholder="Enter age here...">
                        <!-- <span class="form-err"><!?php echo $data['hage_err']; ?></span> -->
                    </div>
                    <div>

                        <label for="hlevelofeducation">Level of Education: <sup>*</sup></label>
                        <select name="hlevelofeducation" id="hlevelofeducation">
                            <option value="">Select Your level of Eduction</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Higher education">Higher education</option>
                        </select>

                        <!-- <span class="form-err"><!?php echo $data['hlevelofeducation_err']; ?></span> -->
                    </div>
                    <div>

                        <label for="hoccupation">Occupation: <sup>*</sup></label>
                        <input type="text" name="hoccupation" placeholder="Enter occupation here...">
                        <br><br>
                        <!-- <span class="form-err"><!?php echo $data['hoccupation_err']; ?></span> -->
                    </div>
                    <div>

                        <label for="hcontactno">Contact no: <sup>*</sup></label>
                        <input type="text" name="hcontactno" placeholder="Enter contact no here...">
                        <br><br>
                        <!-- <span class="form-err"><!?php echo $data['hcontactno_err']; ?></span> -->
                    </div>
                    <div>

                        <label for="hemail">E-mail: <sup>*</sup></label>
                        <input type="email" name="hemail" placeholder="Enter e-mail here...">
                        <br><br>
                        <!-- <span class="form-err"><!?php echo $data['hemail_err']; ?></span> -->
                    </div>



                    <div class="input-box">


                        <!-- <input type="submit" value="Submit"> -->
                        <a href="<?php echo URLROOT; ?>/clinicattendees/request_date"> <input type="submit"
                                value="Submit" class="req_btn"></a>







                        <br> <br>

                    </div>
                    <br> <br>
                </form>
                <br> <br>

            </div>
        </div>


    </div>



    <?php require APPROOT . '/views/inc/footer.php'; ?>