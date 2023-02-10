
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

         <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees"><i class="fa fa-chevron-left"></i></a>
        <br> <br>

        

        <h2 class=" content_h1">Clinic Attendee records</h2>
        <hr class="line">

        <div class="row">

            <div class="report_CA1">

                <h4>Midwife's records</h4> <br>
                <table>
                    <tr>
                        <td>Report No </td>
                        <td>
                            <?php echo $data['detailreport']->reportNo ; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td>
                            <?php echo $data['detailreport']->date; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Weight</td>
                        <td>
                            <?php echo $data['detailreport']->weight; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Vaccination</td>
                        <td>
                            <?php echo $data['detailreport']->vaccination; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Iron or Forlate</td>
                        <td>
                            <?php echo $data['detailreport']->ironorForlate; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Vitamin C</td>
                        <td>
                            <?php echo $data['detailreport']->vitaminC; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Calcium</td>
                        <td>
                            <?php echo $data['detailreport']->calcium; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Antimarial Drugs</td>
                        <td>
                            <?php echo $data['detailreport']->antimarialDrugs; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Triposha</td>
                        <td>
                            <?php echo $data['detailreport']->triposha; ?>
                        </td>
                    </tr>
                </table>
            </div>



            <div class="report_CA2">

                <h4>Doctor's records</h4> <br>
                <table>

                    <tr>
                        <td>Report No </td>
                        <td>
                            <?php echo $data['detailreport']->reportNo ; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Date</td>
                        <td>
                            <?php echo $data['detailreport']->date; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Weight</td>
                        <td>
                            <?php echo $data['detailreport']->weight; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Vaccination</td>
                        <td>
                            <?php echo $data['detailreport']->vaccination; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Iron or Forlate</td>
                        <td>
                            <?php echo $data['detailreport']->ironorForlate; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Vitamin C</td>
                        <td>
                            <?php echo $data['detailreport']->vitaminC; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Calcium</td>
                        <td>
                            <?php echo $data['detailreport']->calcium; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Antimarial Drugs</td>
                        <td>
                            <?php echo $data['detailreport']->antimarialDrugs; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Triposha</td>
                        <td>
                            <?php echo $data['detailreport']->triposha; ?>
                        </td>
                    </tr>

                </table>

            </div>
        </div>



    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>








        


        