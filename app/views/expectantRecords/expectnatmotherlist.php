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
           
            <h2 class="content_h1">Expectant Mothers</h2>
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
                    <th>Date of Registration</th>
                    <th>Expected Date of Delivery</th>
                    <th></th>
                </tr>
                <?php foreach($data['expectantRecords'] as $expectantRecords):?>
                    <tr>
                    <th><?php echo $expectantRecords->nic; ?></a> </th>
                        <td><?php echo $expectantRecords->name; ?></td>
                        <td><?php echo $expectantRecords->registrationDate; ?></td>     
                        <td><?php echo $expectantRecords->expectedDateofDelivery; ?></td>              
                        
                        <td><a href="<?php echo URLROOT; ?>/expectantRecords/info/<?php echo $expectantRecords->nic; ?>" class= "updateDeliveredbutton" > More Info</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
                </div>
    






<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


