<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">


        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a>
        <br> <br>
        <div>
            <div>
                <h2 class="content_h1">Clinic Attendee Profile</h2>
                <a href="<?php echo URLROOT; ?>/clinicattendees/request"><button class="req_btn"><b>Request for
                            registration
                        </b></button></a>

                <hr class="line">



            </div>
            <div class="bg_profile">

                <div>
                    <table>
                        <tr>
                            <th>Personal Details - Mother</th>
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

                            <td><a href="<?php echo URLROOT; ?>"><button class="edit_btn">Edit</button></a></td>
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
                            <th>Personal Details - Father</th>
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

                            <td><a href="<?php echo URLROOT; ?>"><button class="edit_btn">Edit</button></a></td>
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
                            <td>Public Health Midwife Area</td>
                            <td><?php echo $data['profile']->phm; ?></td>
                        </tr>
                    </table>
                </div>
            </div>




        </div>


        <?php require APPROOT . '/views/inc/footer.php'; ?>