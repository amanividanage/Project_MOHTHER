<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
    <div class="content">
        <a href="<?php echo URLROOT; ?>/expectantRecords" class="back"><i class="fa fa-backward"></i>Back</a>
    
    <div class="expectant">
        <div class= "greeting" >

        <div>
           
            <h2 class="content_h1">Delivered List
            <hr class="line">
        </div>
        <div class= "newregdetails">
            <table>
                <tr>
                    <th>Details</th>
                    <th></th>
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Mother Safe/Not</th>
                    <th>Miscarriage/Not</th>
                    <!-- <th>Place of Delivery</th> -->
                    <th></th>
                </tr>
                <?php foreach($data['deliveredlistinfo'] as $deliveredlistinfo):?>
                    <tr>
                    <th><?php echo $deliveredlistinfo->nic; ?></a> </th>
                        <td><?php echo $deliveredlistinfo->name; ?></a></td>
                        <td><?php echo $deliveredlistinfo->mother_safe; ?></a></td>
                        <!-- <td><!?php echo $deliveredlistinfo->date; ?></td> -->
                        <td><?php echo $deliveredlistinfo->miscarriage; ?></td>     
                        <!-- <td><!?php echo $deliveredlistinfo->placeofDelivery; ?></td>               -->
                        <td><a href="<?php echo URLROOT; ?>/expectantRecords/previousPregInfo/<?php echo $deliveredlistinfo->nic; ?>" class= "updateDeliveredbutton" > More Info</a></td>
                       
                    </tr>
                <?php endforeach; ?>
            </table>
            <br><br><br>
        </div>
    </div>
    </div>
                </div>
    






<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


