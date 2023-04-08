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

        <!-- <a href="<!?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a> -->
        <br> <br>
        <div>
            <div>
                <h2 class="content_h1">Clinic Attendee Profile</h2>

                <button class="req_btn" id="myBtn_1"><b>Request
                        for Re-registration for Maternity Clinics</b></button>



                <!-- The Modal -->
                <div id="myModal_1" class="modal_1">

                    <!-- Modal content -->
                    <div class="modal-content_1">
                        <span class="close">&times;</span>
                        <p>Request</p>

                        <a href="<?php echo URLROOT; ?>/clinicattendees/request"><button class="ybtn" type="submit"
                                value="Submit">As a parent?</button></a>
                        <!-- <button class="nbtn" type="reset" value="Reset">As an expextant mother</button> -->
                        <a href="<?php echo URLROOT; ?>/clinicattendees/req_expectant"><button class="nbtn">As an
                                expectantmother</button></a>
                        <br>
                    </div>
                </div>



                <hr class="line">
            </div>
            

            <div class="pro_table">

                <div class="container_profile">
                    <div class="card">
                        <table>
                            <tr>
                                <br> <br>
                                <th>
                                    <h3>Personal Details - Mother</h3>
                                    <hr>
                                </th>

                                <th></th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $data['profile']->mname; ?></td>
                            </tr>
                            <tr>
                                <td>NIC No</td>
                                <td><?php echo $data['profile']->nic; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><?php echo $data['profile']->mage; ?></td>
                            </tr>
                            <tr>
                                <td>Gravidity</td>
                                <td><?php echo $data['profile']->gravidity; ?></td>
                            </tr>
                            <tr>
                                <td>Level of Education</td>
                                <td><?php echo $data['profile']->mlevelofeducation; ?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td><?php echo $data['profile']->moccupation; ?></td>
                            </tr>
                            <tr>
                                <td>Contact No</td>
                                <td><?php echo $data['profile']->mcontactno; ?></td>
                                <td></td>
                            </tr>


                            <tr>
                                <td>Address</td>
                                <td><?php echo $data['profile']->address; ?></td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?php echo $data['profile']->memail; ?></td>
                            </tr>
                            <tr>
                                <td><button class="edit_btn"
                                        onclick="document.getElementById('1').style.display='block'"
                                        style="width:auto;">Edit</button>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <!-- vvvvv -->

                    <div class="card">
                        <table>
                            <br> <br>
                            <tr>
                                <th>
                                    <h3>Personal Details - Father</h3>
                                    <hr>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $data['profile']->hname; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><?php echo $data['profile']->hage; ?></td>
                            </tr>
                            <tr>
                                <td>Level of Education</td>
                                <td><?php echo $data['profile']->hlevelofeducation; ?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td><?php echo $data['profile']->hoccupation; ?></td>
                            </tr>
                            <tr>
                                <td>Contact No</td>
                                <td><?php echo $data['profile']->hcontactno; ?></td>

                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?php echo $data['profile']->hemail; ?></td>
                            </tr>

                            <tr>

                                <th>Other Details</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>Grama Niladhari Division</td>
                                <td><?php echo $data['profile']->gnd; ?></td>
                            </tr>
                            <tr>
                                <td><a href="<?php echo URLROOT; ?>/clinicattendees/profile"><button class="c_pw_btn"
                                            onclick="document.getElementById('11').style.display='block'"
                                            style="width:auto;">change
                                            password</button></a></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- edit mcontact -->
                <div id="1" class="modal">
                    <form class="modal-content animate" action="<?php echo URLROOT; ?>/clinicattendees/profile"
                        method="post">
                        <div class="clinicattendeeinfo">
                            <h2>Change the info</h2>
                            <label for="mcontactno"> Your contact No</label>
                            <input type="text" placeholder="Enter new contact number" name="mcontactno"
                                value='<?php echo $data['profile']->mcontactno; ?>' required>

                            <label for="hcontactno">Husbund's Contact No</label>
                            <input type="text" placeholder="Enter new contact number" name="hcontactno"
                                value='<?php echo $data['profile']->hcontactno; ?>' required>

                            <button class="back_btn" type="submit">Submit</button>
                            <br> <br>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="<?php echo URLROOT ; ?>/js/clinicattendee.js"></script>
        <?php require APPROOT . '/views/inc/footer.php'; ?>

