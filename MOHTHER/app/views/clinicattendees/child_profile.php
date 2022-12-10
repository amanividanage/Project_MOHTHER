<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">


        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a>
        <br> <br>
        <div>
            <div>
                <h2 class="content_h1">Child Profile</h2>


                <hr class="line">



            </div>
            <div class="bg_profile">

                <div>
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $data['child_profile']->	name; ?></td>
                        </tr>
                        <tr>
                            <td>Date of birth</td>
                            <td><?php echo $data['child_profile']->dob; ?></td>
                        </tr>
                        <tr>
                            <td>Registered date</td>
                            <td><?php echo $data['child_profile']->date; ?></td>
                        </tr>
                        <tr>
                            <td>Hospital</td>
                            <td><?php echo $data['child_profile']->hospital; ?></td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td><?php echo $data['child_profile']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>Circumference</td>
                            <td><?php echo $data['child_profile']->circumference; ?></td>
                        </tr>
                        <tr>
                            <td>Length</td>
                            <td><?php echo $data['child_profile']->length; ?></td>


                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $data['child_profile']->special; ?></td>
                        </tr>

                    </table>
                </div>
            </div>




        </div>


        <?php require APPROOT . '/views/inc/footer.php'; ?>