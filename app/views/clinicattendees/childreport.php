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
        <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees/child"><i class="fa fa-chevron-left"></i></a>

        <br><br>

        

        <h1 class="content_h1">Child Records</h1>
        <hr class="line">

        <div class="row_re">
            <div class="report_CA3">
                <h4>By Midwife</h4> <br>
                <table>
                    <tr>
                        <td>Date</td>
                        <td>
                            <?php echo $data['detailrecord']->date; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Skin color</td>
                        <td>
                            <?php echo $data['detailrecord']->skin; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Temperature</td>
                        <td>
                            <?php echo $data['detailrecord']->temp; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nature of the umbilicus</td>
                        <td>
                            <?php echo $data['detailrecord']->umbilicus; ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Feeding breast milk</td>
                        <td>
                            <--?php echo $data['child_report']->	; ?>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td>Triposha</td>
                        <td>
                            <!?php echo $data['child_report']->memail; ?>
                        </td>
                    </tr> -->
                </table>
            </div>


            <div class="report_CA4">
                <h4>By Doctor</h4>
                <br>
                <table>
                    <tr>
                        <td>Date</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td> Eye size difference</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Cataract</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Corneal opacity</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Eye movement disorders</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Hearing - left and right ear</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Dental health </td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>White or brown spots</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Dental cavities</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Improvement</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Weight</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>heart disease</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Lungs</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Hip joint</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Congenital disorders</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Other medical condition</td>
                        <td>
                            <!--?php echo $data['']->; ?-->
                        </td>
                    </tr>
                </table>

                

            </div>

            <br> <br> <br>

        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>