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

        <a href="<?php echo URLROOT; ?>/clinicattendees/children"><button class="back_btn">Children</button></a>

        <br> <br>

        <h2><?php echo $data['child']->name ;?> </h2>

        <div class="row_CA">
            <div class="dashboard_CA">
                <h4>Next Clinic Date</h4> <br>
                <div>
                    <p>
                    Monthly Clinic

                    <br><br>
                    Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/child_timeslot_mothlyclinic"><button class="reserve_btn">Reserve</button></a>
                    </div>
                </div>

                <br> <br>

                <div>
                    <p>
                    Next vaccination

                    <br><br>
                    Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<?php echo URLROOT; ?>/clinicattendees/child_timeslot_vaccination"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>
            </div>


            <div class="dashboard_CA">
                <br>

                <div class="">
                    Charts
                    <a href="<?php echo URLROOT; ?>/clinicattendees/child_chart"><button class="go_1_btn"><b>GO</b></button></a>

                    <br><br> <br><br> <br><br>

                    Vaccination
                    <a href="<?php echo URLROOT; ?>/clinicattendees/child_vaccination"><button class="go_1_btn"><b>Go</b></button></a>
                </div>
            </div>
        </div>

        <div class="T1">
            
            <br> <br>

            <h3>Monthly Reports </h3>

            <table>
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
                            <td colspan=2><a href="<?php echo URLROOT; ?>/clinicattendees/childreport/<?php echo $data['id'] ;?>/<?php echo $records->reportno; ?>"><button class="more_btn"><b>More</b></button></a></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>

        

    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>





        



        





        




        




        