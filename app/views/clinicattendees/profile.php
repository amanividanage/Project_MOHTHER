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

                <!-- <button class="req_btn" id="myBtn_1"><b>Request
                        for Re-registration for Maternity Clinics</b>
                </button> -->

                

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
                    <a href="<?php echo URLROOT; ?>/clinicattendees/req_expectant">
                        <button class="req_btn" id="myBtn_1">
                            <b>Request for Re-registration for Maternity Clinics</b>
                        </button>
                    </a>
                    <br><br>
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
                    <!-- <tr>
                        <td></td>
                        <td><button class="edit_btn" onclick="document.getElementById(\'1\').style.display=\'block\'" style="width:auto;">Edit</button></td>
                    </tr> -->
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
                        <td><button onclick="editExpectant('<?php echo $data['profile_expectant']->mcontactno; ?>', '<?php echo $data['profile_expectant']->hcontactno; ?>')">Edit Profile</button></td>
                        <td><a href="<?php echo URLROOT; ?>/clinicattendees/changeexpectantpassword"><button>Change Password</button></a></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                <?php 
                    } else {
                        ?>
                            <a href="<?php echo URLROOT; ?>/clinicattendees/req_parent">
                                <button class="req_btn" id="myBtn_1">
                                    <b>Request for Re-registration for Maternity Clinics</b>
                                </button>
                            </a>
                            <br><br>


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

                        <!-- <td><button class="edit_btn" onclick="document.getElementById(\'1\').style.display=\'block\'" style="width:auto;">Edit</button></td> -->
                    </tr>
                    </table>
                    </div>
                    </div>

                    <div class="card">
                    <div class="container">
                    <table>
                    <thead>
                        <tr>
                            <th colspan=2>Parent Details</th>
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
                        <td><button onclick="editParent('<?php echo $data['profile_parent']->contactno; ?>')">Edit Profile</button></td>
                        <td><a href="<?php echo URLROOT; ?>/clinicattendees/changeparentpassword"><button>Change Password</button></a></td>
                    </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                        <?php
                    }
                ?>
    
            </div>

            

            <div id="edit-modal1" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-form1" action="<?php echo URLROOT; ?>/clinicattendees/profile" method="post" onsubmit="return validateForm1()">
                        <label for="edit-mcontact">Mother Contact No:</label>
                        <input type="text" id="edit-mcontact" name="edit-mcontact" required>
                        <span id="phone-error1" class="popup-form-err"></span><br>

                        <label for="edit-hcontact">Father Contact No:</label>
                        <input type="text" id="edit-hcontact" name="edit-hcontact" required>
                        <span id="phone-error2" class="popup-form-err"></span><br>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>

            <div id="edit-modal2" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-form2" action="<?php echo URLROOT; ?>/clinicattendees/profile" method="post" onsubmit="return validateForm2()">
                        <label for="edit-contact">Parent's Contact No:</label>
                        <input type="text" id="edit-contact" name="edit-contact" required>
                        <span id="phone-error" class="popup-form-err"></span><br>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
            
            <script>
                function validateForm1() {
                    var mcontact = document.forms["edit-form1"]["edit-mcontact"].value;
                    var hcontact = document.forms["edit-form1"]["edit-hcontact"].value;

                    if (mcontact == "" || hcontact == "") {
                        alert("Please fill out all fields");
                        return false;
                    }


                    var phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(mcontact)) {
                        document.getElementById("phone-error1").innerHTML = "Invalid Phone Number";
                        document.getElementById("phone-error1").style.visibility = "visible";
                        return false;
                    } else if(!phoneRegex.test(hcontact)){
                        document.getElementById("phone-error2").innerHTML = "Invalid Phone Number";
                        document.getElementById("phone-error2").style.visibility = "visible";
                        return false;
                    } else {
                        document.getElementById("phone-error1").style.visibility = "hidden";
                        document.getElementById("phone-error2").style.visibility = "hidden";
                        return true;
                    }

                }

                function validateForm2() {
                    var contact = document.forms["edit-form2"]["edit-contact"].value;

                    if (contact == "") {
                        alert("Please fill out all fields");
                        return false;
                    }


                    var phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(contact)) {
                        document.getElementById("phone-error").innerHTML = "Invalid Phone Number";
                        document.getElementById("phone-error").style.visibility = "visible";
                        return false;
                    } else {
                        document.getElementById("phone-error").style.visibility = "hidden";
                        return true;
                    }

                }

                function editExpectant(mcontact, hcontact) {
                    // Get the input fields in the edit form
                    var mcontactField = document.getElementById("edit-mcontact");
                    var hcontactField = document.getElementById("edit-hcontact");

                    // Set the values of the input fields to the data from the row
                    mcontactField.value = mcontact;
                    hcontactField.value = hcontact;

                    // Show the popup modal
                    document.getElementById('edit-modal1').style.display='block';
                }

                function editParent(contact) {
                    // Get the input fields in the edit form
                    var contactField = document.getElementById("edit-contact");

                    // Set the values of the input fields to the data from the row
                    contactField.value = contact;

                    // Show the popup modal
                    document.getElementById('edit-modal2').style.display='block';
                }

                    
            </script>
            

                    

           


            <!-- <script src="<!?php echo URLROOT ; ?>/js/clinicattendee.js"></script> -->
            <?php require APPROOT . '/views/inc/footer.php'; ?>