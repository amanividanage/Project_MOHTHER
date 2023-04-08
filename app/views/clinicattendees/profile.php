<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <!-- <a href="<!?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a> -->
      
        <div>
            <div>
                <h2 class="content_h1">Clinic Attendee Profile</h2>

                <button class="req_btn" id="myBtn_1"><b>Request
                        for Re-registration for Maternity Clinics</b></button>

<br><br>

                <!-- The Modal -->
                <!-- <div id="myModal_1" class="modal_1">

                    <! Modal content -->
                    <!-- <div class="modal-content_1">
                        <span class="close">&times;</span>
                        <p>Request</p>

                        <!?php if(!empty($data['profile_expectant'])){
                            
                            echo '<a href="' . URLROOT . '/clinicattendees/req_expectant"><button class="nbtn">As an
                                Expectantmother</button></a>';
                        } else {

                        echo'<a href="' . URLROOT . '/clinicattendees/request"><button
                            class="ybtn" type="submit" value="Submit">As a parent?</button></a>';


                        }
                        ?>





                    </div> 
                </div> -->


            
            
                <?php 
                    if (!empty($data['profile_expectant'])) {
                ?>
                <div class="mine">
                    <div class="card">
                    <div class="container">
                    <table>
                    <thead>
                        <tr>
                            <th colspan=2>Mother Records</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $data['profile_expectant']->mname; ?></td>
                    </tr>
                    <tr>
                        <td>NIC No: </td>
                        <td><?php echo $data['profile_expectant']->nic; ?></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td><?php echo $data['profile_expectant']->mage; ?> </td>
                    </tr>
                    <tr>
                        <td>Gravidity:</td>
                        <td><?php echo $data['profile_expectant']->gravidity; ?></td>
                    </tr>
                    <tr>
                        <td>Level of Education: </td>
                        <td><?php echo $data['profile_expectant']->mlevelofeducation; ?></td>
                    </tr>
                    <tr>
                        <td>Occupation:</td>
                        <td><?php echo $data['profile_expectant']->moccupation; ?></td>
                    </tr>
                    <tr>
                        <td>Contact No:</td>
                        <td><?php echo $data['profile_expectant']->mcontactno; ?></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><?php echo $data['profile_expectant']->address; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo $data['profile_expectant']->memail; ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="edit_btn" onclick="document.getElementById(\'1\').style.display=\'block\'" style="width:auto;">Edit</button></td>
                    </tr>
                    </table>
                    </div>
                    </div>

                    <div class="card">
                    <div class="container">
                    <table>
                    <thead>
                        <tr>
                            <th colspan=2>Father Records</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $data['profile_expectant']->hname; ?></td>
                    </tr>
                    <tr>
                        <td>Age: </td>
                        <td><?php echo $data['profile_expectant']->hage; ?></td>
                    </tr>
                    <tr>
                        <td>Level of Education: </td>
                        <td><?php echo $data['profile_expectant']->hlevelofeducation; ?></td>
                    </tr>
                    <tr>
                        <td>Occupation:</td>
                        <td><?php echo $data['profile_expectant']->hoccupation; ?></td>
                    </tr>
                    <tr>
                        <td>Contact No:</td>
                        <td><?php echo $data['profile_expectant']->hcontactno; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo $data['profile_expectant']->hemail; ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="edit_btn" onclick="document.getElementById(\'1\').style.display=\'block\'" style="width:auto;">Edit</button></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                <?php 
                    } else {
                        ?>
                        <div class="mine">
                    <div class="card">
                    <div class="container">
                    <table>
                    <thead>
                        <tr>
                            <th colspan=2>Parent Details</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Relationship:</td>
                        <td><?php echo $data['profile_parent']->relationship; ?></td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td><?php echo $data['profile_parent']->name; ?></td>
                    </tr>
                    <tr>
                        <td>NIC:</td>
                        <td><?php echo $data['profile_parent']->nic; ?> </td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td><?php echo $data['profile_parent']->age; ?></td>
                    </tr>
                    <tr>
                        <td>Number of children: </td>
                        <td><?php echo $data['profile_parent']->nochildren; ?></td>
                    </tr>
                    <tr>
                        <td>Level Of Education:</td>
                        <td><?php echo $data['profile_parent']->levelofeducation; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="edit_btn" onclick="document.getElementById(\'1\').style.display=\'block\'" style="width:auto;">Edit</button></td>
                    </tr>
                    </table>
                    </div>
                    </div>

                    <div class="card">
                    <div class="container">
                    <table>
                    <thead>
                        <tr>
                            <th colspan=2>Parent Records</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Occupation:</td>
                        <td><?php echo $data['profile_parent']->occupation; ?></td>
                    </tr>
                    <tr>
                        <td>Contact No:</td>
                        <td><?php echo $data['profile_parent']->contactno; ?></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><?php echo $data['profile_parent']->address; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><?php echo $data['profile_parent']->email; ?> </td>
                    </tr>
                    <tr>
                        <td>PHM Area: </td>
                        <td><?php echo $data['profile_parent']->phm; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="' . URLROOT . '/clinicattendees/changePassword"><button class="c_pw_btn" onclick="document.getElementById(\'11\').style.display=\'block\'" style="width:auto;">change password</button></a></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                        <?php
                    }
                ?>



                <hr class="line">
            </div>

            

                    <!-- edit mcontact -->
                    <div id="1" class="modal">
                        <!-- <form class="modal-content animate" action="</?php echo URLROOT; ?>/clinicattendees/profile"
                            method="post"> -->

                        <!-- <div class="clinicattendeeinfo">
                                <h2>Change the info</h2>
                                <label for="mcontactno"> Your contact No</label>
                                <input type="text" placeholder="Enter new contact number" name="mcontactno"
                                    value='</?php echo $data[' profile_expectant']->mcontactno; ?>' required>

                                <label for="hcontactno">Husbund's Contact No</label>
                                <input type="text" placeholder="Enter new contact number" name="hcontactno"
                                    value='</?php echo $data[' profile_expectant']->hcontactno; ?>' required>

                                <button class="back_btn" type="submit">Submit</button>
                                <br> <br>

                            </div> -->

                        <?php if(!empty($data['profile_expectant'])){ ?>
                        <form name="edit-form_1" class="modal-content animate"
                            action="<?php echo URLROOT; ?>/clinicattendees/profile" method="post"
                            onsubmit="return validateForm_1()">
                            <div class="clinicattendee_expectant_info">
                                <h2>Change the info</h2>
                                <label for="m_contactno"> Your contact No</label>
                                <input type="text" placeholder="Enter new contact number" name="m_contactno"
                                    value="<?php echo $data['profile_expectant']->mcontactno; ?>" required>
                                <span class="form-err"
                                    id="m_contactno_err"><?php echo $data['m_contactno_err']; ?></span>

                                <label for="h_contactno">Husband's Contact No</label>
                                <input type="text" placeholder="Enter new contact number" name="h_contactno"
                                    value="<?php echo $data['profile_expectant']->hcontactno; ?>" required>
                                <span class="form-err"
                                    id="h_contactno_err"><?php echo $data['h_contactno_err']; ?></span>
                                <button class="back_btn" type="submit">Submit</button>

                                <br> <br>
                            </div>
                        </form>
                        <?php } else { ?>
                        <form name="edit-form_1" class="modal-content animate"
                            action="<?php echo URLROOT; ?>/clinicattendees/profile" method="post"
                            onsubmit="return validateForm_1()">
                            <div class="clinicattendee_parent_info">
                                <label for="contact_no">Contact No</label>
                                <input type="text" placeholder="Enter new contact number" name="contact_no"
                                    value="<?php echo $data['profile_parent']->contactno; ?>" required>
                                <span class="form-err" id="contact_no_err"><?php echo $data['contact_no_err']; ?></span>
                                <button class="back_btn" type="submit"
                                    onclick="clinicattendee_parent_info('<?php echo $data['profile_parent']->contactno; ?>')">Submit</button>
                                <br> <br>
                            </div>
                        </form>
                        <?php } ?>




                    </div>
                </div>
            </div>




            <script>
            function validateForm_1() {
                var m_contactno = document.forms["edit-form_1"]["m_contactno"].value;
                var h_contactno = document.forms["edit-form_1"]["h_contactno"].value;
                var contact_no = document.forms["edit-form_1"]["contact_no"].value;


                if (m_contactno == "" || h_contactno == "" || contact_no == "") {
                    alert("Please fill out all fields");
                    return false;
                }

                var m_contactnoRegex = /^\d{10}$/;
                if (!m_contactnoRegex.test(m_contactno)) {
                    document.getElementById("m_contactno_err").innerHTML = "Invalid Phone Number";
                    document.getElementById("m_contactno_err").style.visibility = "visible";
                    return false;
                } else {
                    document.getElementById("m_contactno_err").style.visibility = "hidden";
                    return true;
                }



            }

            <script src = "<?php echo URLROOT ; ?>/js/clinicattendee.js" >
            </script>



            <script src="<?php echo URLROOT ; ?>/js/clinicattendee.js"></script>
            <?php require APPROOT . '/views/inc/footer.php'; ?>