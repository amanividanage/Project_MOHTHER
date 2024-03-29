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
<div class="expectant">
<div class= "greeting" >


<b>
<?php
date_default_timezone_set('Asia/Colombo'); // Set the time zone
$now = new DateTime('now', new DateTimeZone('Asia/Colombo')); // Get the current time
$hour = (int) $now->format('G'); // Get the hour (as an integer)

if ($hour >= 0 && $hour < 12) {
    echo $now->format('h:i:s A') . '<br>Good Morning';
} else if ($hour >= 12 && $hour < 18) {
    echo $now->format('h:i:s A') . '<br>Good Afternoon';
} else {
    echo $now->format('h:i:s A') . '<br>Good Evening';
}

echo '<br>';
echo 'Today is: ' . $now->format('d/m/Y');
?>
</b>
<!-- <!?php
$hr = date(" G");
if( $hr >= 00 && $hr <12){
    date_default_timezone_set("Asia/Colombo");

    echo date("h:i:s A") . "<br>". "Good Morning"; 
}else if($hr >12 && $hr< 18) {
    date_default_timezone_set("Asia/Colombo");
    
    echo date(" h:i:s A") . "<br>". "Good Afternoon"; 
}

else if($hr> 18){date_default_timezone_set("Asia/Colombo");
    
    echo date(" h:i:s A") . "<br>". "Good Evening"; }


    
?>
</b>
<br>

<!?php


echo "Today is : ";
$today = date("d/m/Y");
echo $today;
?> -->
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
                <div id="image">
                <?php foreach($data['newexpectantRecords'] as $newexpectantRecords):?>
                    <tr>
                        <td><?php echo $newexpectantRecords->nic; ?></td> 
                        <td><?php echo $newexpectantRecords->mname; ?></td>    
                        

                        <td>    <a href="<?php echo URLROOT; ?>/users/register/<?php echo $newexpectantRecords->nic; ?>" class= "updateDeliveredbutton" > Add</a></button> </td>  
                        <td><a href="<?php echo URLROOT; ?>/expectantRecords/deleteusers/<?php echo $newexpectantRecords->nic; ?>" class= "updateDeliveredbutton" > Ignore</a></td>
                    </tr>
<!--                   
                    <a href="<!?php echo URLROOT; ?>/calendars/timeslot/<!?php echo $timeSlots->calendar_id; ?>" class= "updateDeliveredbutton" > Ignore</a> -->
                <?php endforeach; ?>
                </div>
            </table>
                   

        </div>
       
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


