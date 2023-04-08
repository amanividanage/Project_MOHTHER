<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_doctor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_doctor.php' ; ?>
    <div class="content">
    
        <a href="<?php echo URLROOT; ?>/doctorRecords/expectantmothers" class="back"><i class="fa fa-backward"></i>  Back</a>
            
        <br>
            
                <h2 class="content_h1">Monthly Records - <?php echo $data['mother']->name; ?>  ->  Date - <?php echo $data['midwiferecords']->date; ?></h2><br>
            
            

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
                            <td>Weightr:</td>
                            <td><?php echo $data['midwiferecords']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>BMI: </td>
                            <td><?php echo $data['midwiferecords']->bmi; ?></td>
                        </tr>
                        <tr>
                            <td>Blood Pressure:</td>
                            <td><?php echo $data['midwiferecords']->bp; ?> </td>
                        </tr>
                        <tr>
                            <td>Iron Or Forlate:</td>
                            <td><?php echo $data['midwiferecords']->ironorForlate; ?></td>
                        </tr>
                        <tr>
                            <td>Vitamin C: </td>
                            <td><?php echo $data['midwiferecords']->vitaminC; ?></td>
                        </tr>
                        <tr>
                            <td>Calcium:</td>
                            <td><?php echo $data['midwiferecords']->calcium; ?></td>
                        </tr>
                        <tr>
                            <td>Antimarial Drugs:</td>
                            <td><?php echo $data['midwiferecords']->antimarialDrugs; ?></td>
                        </tr>
                        <tr>
                            <td>Triposha:</td>
                            <td><?php echo $data['midwiferecords']->triposha; ?></td>
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
                        <tr>
                            <td>Pallor:</td>
                            <td><?php echo $data['doctorrecords']->pallor; ?></td>
                        </tr>
                        <tr>
                            <td>FHS: </td>
                            <td><?php echo $data['doctorrecords']->fhs; ?></td>
                        </tr>
                        <tr>
                            <td>FM:</td>
                            <td><?php echo $data['doctorrecords']->fm; ?> </td>
                        </tr>
                        <tr>
                            <td>Ankle:</td>
                            <td><?php echo $data['doctorrecords']->ankle; ?></td>
                        </tr>
                        <tr>
                            <td>Facial: </td>
                            <td><?php echo $data['doctorrecords']->facial; ?></td>
                        </tr>
                        <tr>
                            <td>Delivary:</td>
                            <td><?php echo $data['doctorrecords']->delivary; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>
            
            </div>

            <br>
            <br>
            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


