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

    <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees/children"><i
                class="fa fa-chevron-left"></i></a>

        <br> <br>

        <h2 class="content_h1"><?php echo $data['child']->name ;?> </h2>

        <div class="row_CA">
            <div class="dashboard_CA">
                <table class="child_pro_table">

                    <tr>
                        <th>
                            <h3>Baby's details</h3>

                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $data['child']->name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of birth</td>
                        <td><?php echo $data['child']->dob; ?></td>
                    </tr>
                    <tr>
                        <td>Registration date</td>
                        <td><?php echo $data['child']->date; ?></td>
                    </tr>
                    <tr>
                        <td>Hospital</td>
                        <td><?php echo $data['child']->hospital; ?></td>
                    </tr>

                    <tr>
                        <td>Birth weight</td>
                        <td><?php echo $data['child']->weight; ?></td>
                    </tr>

                    <tr>
                        <td>Circumference</td>
                        <td><?php echo $data['child']->circumference; ?></td>
                    </tr>

                    <tr>
                        <td>Length</td>
                        <td><?php echo $data['child']->length; ?></td>
                    </tr>

                    <tr>
                        <td>Special comments</td>
                        <td><?php echo $data['child']->special; ?></td>
                    </tr>

                </table>

            </div>



            <div class="dashboard_CA">


                <div>
                    Charts
                    <a href="<?php echo URLROOT; ?>/clinicattendees/child_chart"><button
                            class="go_1_btn"><b>GO</b></button></a>

                    <br><br> <br> <br> <br>

                    Vaccination
                    <a href="<?php echo URLROOT; ?>/clinicattendees/child_vaccination"><button
                            class="go_1_btn"><b>Go</b></button></a>
                </div>
                <br>
                <!-- <h4>Next Clinic Date</h4> -->
                <div>
                    <br>
                    <p>
                        Monthly Clinic

                        <br><br>
                        Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>



                <div>
                    <p>
                        Next vaccination

                        <br><br>
                        Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="T1">
            <br> <br>

            <h3>Monthly Reports
                <hr>
            </h3>
            <br><br>

            <div class="card_1">
                <table class="index_table">
                    <thead>
                        <tr>
                            <th>Record No</th>
                            <th>Date</th>
                            <th>Skin color</th>
                        </tr>
                    </thead>
                    <?php foreach($data['records'] as $records) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $records->reportno; ?></td>
                            <td><?php echo $records->date; ?></td>
                            <td><?php echo $records->skin; ?></td>
                            <td colspan=2><a
                                    href="<?php echo URLROOT; ?>/clinicattendees/childreport/<?php echo $data['id'] ;?>/<?php echo $records->reportno; ?>"><button
                                        class="more_btn"><b>More</b></button></a></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        
<br>
<br>
<br>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>





        



        





        




        




        