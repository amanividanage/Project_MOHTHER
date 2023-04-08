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

    

  <!-- <!?php if (!empty($timeSlots)): ?>
   
    <ul>
      <!?php foreach ($timeSlots as $timeSlot): ?>
        <li><!?php echo $timeSlot['start_time'] . ' - ' . $timeSlot['end_time']; ?></li>
      <!?php endforeach; ?>
    </ul>
    <!?php endif; ?> -->

    <div class="time-slot-container">
   
        

   
           
           <h2 class="content_h1">Time Slots for <!--?php echo $data['timeSlots']->clinic_date; ?--> </h2>
       
           <!-- <hr class="line"> -->
       </div>
       <div class= "newregdetails">
           <table>
               <tr>
          <!--     ?php echo $clinicdetails->title; ?> -->
                   <th>Details </th>
                   <th></th>
               </tr>
               <tr>
                   <th>slot id</th>
                   <th>Time duration</th>
                   
                  
               </tr>
               <?php foreach($data['timeSlots'] as $timeSlots):?>
               
                    <tr>
                    <th ><?php echo $timeSlots->clinic_timeslot_id; ?></th>
                        <td class= "timeslotbox"><?php echo $timeSlots->start_time; ?> - <?php echo $timeSlots->end_time;; ?></td>
                                    
                    </tr>
                <?php endforeach; ?>

                
              
           </table>
       </div>
   </div>
   </div>
               </div>
                
    
