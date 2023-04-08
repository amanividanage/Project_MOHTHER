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

    <h2 class="content_h1">Monthly Records - <?php echo $data['mother']->name; ?>  ->  Date - <?php echo $data['midwife_records']->date; ?></h2><br>

    <div class="mine">
                <div class="card">
                    <div class="container">
                        <table>
                            <thead>
                        <tr>
                            <th colspan=2>Midwife Records</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Weight:</td>
                            <td><?php echo $data['midwife_records']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>BMI: </td>
                            <td><?php echo $data['midwife_records']->bmi; ?></td>
                        </tr>
                        <tr>
                            <td>Body pressure:</td>
                            <td><?php echo $data['midwife_records']->bp; ?> </td>
                        </tr>
                        <tr>
                            <td>Iron or Forlate:</td>
                            <td><?php echo $data['midwife_records']->ironorForlate; ?></td>
                        </tr>
                        <tr>
                            <td>Vitamin C: </td>
                            <td><?php echo $data['midwife_records']->vitaminC; ?></td>
                        </tr>
                        <tr>
                            <td>Calcium:</td>
                            <td><?php echo $data['midwife_records']->calcium; ?></td>
                        </tr>
                        <tr>
                            <td>Antimarial Drugs:</td>
                            <td><?php echo $data['midwife_records']->antimarialDrugs; ?></td>
                        </tr>
                        <tr>
                            <td>Triposha:</td>
                            <td><?php echo $data['midwife_records']->triposha; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>

                <div class="card">
                    <div class="container">
                        <table>
                            <thead>
                        <tr>
                            <th colspan=2>Doctor Records</th>
                        </tr>
                        </thead>

                        <?php 
                        if (!empty($data['doctor_records'])) {
                            ?>
                            <tr>
                                <td>Eye size difference:</td>
                                <td><?php echo $data['doctor_records']->pallor; ?></td>
                            </tr>
                            <tr>
                                <td>Cataract: </td>
                                <td><?php echo $data['doctor_records']->fhs; ?></td>
                            </tr>
                            <tr>
                                <td>Corneal opacity:</td>
                                <td><?php echo $data['doctor_records']->fm; ?> </td>
                            </tr>
                            <tr>
                                <td>Eye movement disorders:</td>
                                <td><?php echo $data['doctor_records']->ankle; ?></td>
                            </tr>
                            <tr>
                                <td>Hearing Disorders: </td>
                                <td><?php echo $data['doctor_records']->facial; ?></td>
                            </tr>
                            <tr>
                                <td>Right ear:</td>
                                <td><?php echo $data['doctor_records']->delivary; ?></td>
                            </tr>
                            <?php 
                        } else {
                            ?>
                            <tr>
                                <td>Not available yet</td>
                            </tr>
                            <?php
                        }
                        ?>


                        
                        </table> 
                    </div>
                </div>
            
            </div>

            <br>
            <br> 

    
        <?php require APPROOT . '/views/inc/footer.php'; ?>