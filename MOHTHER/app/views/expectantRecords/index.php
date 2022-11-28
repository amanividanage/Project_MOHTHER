<?php require APPROOT . '/views/inc/header.php'; ?>
<html>
   <head>
   <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_Midwife.css">
   </head>
   </head>
</html>
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
</div>

<?php


echo "Today is : ";
$today = date("d/m/Y");
echo $today;
?>
<br>



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
                <?php foreach($data['expectantRecords'] as $expectantRecords):?>
                    <tr>
                        <th><?php echo $expectantRecords->nic; ?></th> 
                        <th><?php echo $expectantRecords->mfirstName; ?></th>          
                        <th><a href="<?php echo URLROOT; ?>/pages/about" class= "updateDeliveredbutton" > Add</a></th>
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
                    <th><a href="pages/about/<?php echo $expectantRecords->nic; ?>"><?php echo $expectantRecords->nic; ?></a> </th>
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


