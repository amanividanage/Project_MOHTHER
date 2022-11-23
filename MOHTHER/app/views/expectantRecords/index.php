<?php require APPROOT . '/views/inc/header.php'; ?>
<html>
   <head>
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_Midwife.css">
   </head>
   </head>
</html>

<?php


echo "Today's date is :";
$today = date("d/m/Y");
echo $today;
?>
<br>

<?php
$hr = date("G");
if( $hr >= 20 && $hr <23){
    echo "You are getting closer to the end of the day"   ;
}else{
    echo "Good evening";
}
?>

<div>
        <div>
            <h2 class="content_h1">New Registrants</h2>
            <hr class="line">
        </div>
        <div>
            <table class= "">
                <tr>
                    <th>Details</th>
                    <th></th>
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                   
                </tr>
                <?php foreach($data['expectantRecords'] as $expectantRecords):?>
                    <tr>
                        <th><?php echo $expectantRecords->nic; ?></th>
                        <th><?php echo $expectantRecords->mfirstName; ?></th>
                                   
                        <th><a href="<?php echo URLROOT; ?>/users/register" class= "updateDeliveredbutton" > Add</a></th>
                        <th><a href="<?php echo URLROOT; ?>/users/register" class= "updateDeliveredbutton" > Ignore</a></th>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


<div>
        <div>
            <h2 class="content_h1">Expectant Mothers</h2>
            <hr class="line">
        </div>
        <div>
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
                        <th><?php echo $expectantRecords->nic; ?></th>
                        <th><?php echo $expectantRecords->mfirstName; ?></th>
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

    






<?php require APPROOT . '/views/inc/footer.php'; ?>


