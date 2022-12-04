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
<div class="expectant">
<div class= "greeting" >


<b>
<?php
$hr = date("G");
if( $hr >= 01 && $hr <13){
    echo "Good Morning"   ;
}else{
    echo "Good Evening";
}
?>
</b>
<br>

<?php


echo "Today is : ";
$today = date("d/m/Y");
echo $today;
?>
<br>

</div>

<div>
        <div>
            <h2 class="content_h1">New Registrants</h2>
            <hr class="line">
        </div>
        <div class= "newregdetails">
            <table class= "">
                <tr>
                    <th>Details</th>
                    <th></th>
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                   
                </tr>
                <?php foreach($data['newexpectantRecords'] as $newexpectantRecords):?>
                    <tr>
                        <th><?php echo $newexpectantRecords->nic; ?></th> 
                        <th><?php echo $newexpectantRecords->mname; ?></th>          
                        <th><a href="<?php echo URLROOT; ?>/users/register" class= "updateDeliveredbutton" > Add</a></th>
                        <th><a href="<?php echo URLROOT; ?>/pages/about" class= "updateDeliveredbutton" > Ignore</a></th>
                    </tr>
                
                <?php endforeach; ?>
            </table>
        </div>
    </div>



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
                    <th>EmailAddress</th>
                    <th>Contact No</th>
                    <th>Date of Registration</th>
                    <th>Date of Delivery</th>
                    <th></th>
                </tr>
                <?php foreach($data['expectantRecords'] as $expectantRecords):?>
                    <tr>
                    <th><a href="expectantRecords/info/<?php echo $expectantRecords->nic; ?>"><?php echo $expectantRecords->nic; ?></a> </th>
                        <th><?php echo $expectantRecords->mname; ?></th>
                        <th><?php echo $expectantRecords->memail; ?></th>
                        <th><?php echo $expectantRecords->mcontactno; ?></th> 
                        <th><?php echo $expectantRecords->registrationDate; ?></th>     
                        <th><?php echo $expectantRecords->expectedDateofDelivery; ?></th>              
                        
                        <th><a href="<?php echo URLROOT; ?>/users/register" class= "updateDeliveredbutton" > Delivered</a></th>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
    






<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


