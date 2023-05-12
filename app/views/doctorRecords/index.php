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
            <div class="greeting">
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
        </div>
        <div>
            <table>
                <tr>
                    <th>Details of Today's Expectant Mothers</th>
                    <th></th>
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Date of Registration</th>
                    <th>Expected Date of Delivery</th>
                    <th></th>
                </tr>
                <?php foreach($data['mothersforToday'] as $mothersforToday):?>
                    <tr>
                    <th><?php echo $mothersforToday->nic; ?></a> </th>
                        <td><?php echo $mothersforToday->name; ?></td>
                        <td><?php echo $mothersforToday->registrationDate; ?></td>     
                        <td><?php echo $mothersforToday->expectedDateofDelivery; ?></td>              
                        
                        <td><a href="<?php echo URLROOT; ?>/doctorRecords/info/<?php echo $mothersforToday->nic; ?>" class="more1999"> More Info </a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
            



            

<?php require APPROOT . '/views/inc/footer.php'; ?>

