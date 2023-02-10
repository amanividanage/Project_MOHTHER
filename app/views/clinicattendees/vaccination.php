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
        <!-- <a href="</?php echo URLROOT; ?>/clinicattendees" class="back_btn"> <button class="back_btn">Back</button></a> -->
        <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees"><i class="fa fa-chevron-left"></i></a>
        <br><br>
        <h1>Vaccination</h1>

        <br>
        <!-- <h2>Tetanus Toxoid Immunization</h2> -->
        <h2 class="content_h1">Tetanus Toxoid Immunization</h2>

        <div class="card_vaccination">
            <table>
                <thead>
                    <tr>
                        <th>Dose</th>
                        <th>Date</th>
                        <th>Batch NO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1<sup>st</sup> dose</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>2<sup>nd</sup> dose</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3<sup>rd</sup> dose</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4<sup>th</sup> dose</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5<sup>th</sup> dose</td>
                        <td></td>
                        <td></td>
                    </tr>


                </tbody>
            </table>
        </div>

        <br> <br>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>