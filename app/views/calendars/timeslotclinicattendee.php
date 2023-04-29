<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
  
 
</head>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

    <div class="time-slot-container">
   
        

   
           
           <h2 class="content_h1">Time Slots for <!--?php echo $data['timeSlots']->clinic_date; ?--> </h2>
       
       
       </div>
       <div class= "newregdetails">
           <table>
               <tr>
          <!--     ?php echo $clinicdetails->title; ?> -->
                   <th>Details </th>
                   <th></th>
               </tr>
               <tr>
                   <th>Time duration</th>
                   <th>Reserved or Not</th>
                   
                  
               </tr>
               <?php foreach($data['timeSlots'] as $timeSlots):?>
               
                    <tr>
                    <!-- <th ><!?php echo $timeSlots->clinic_timeslot_id; ?></th> -->
                        <td class= "timeslotbox"><?php echo $timeSlots->start_time; ?> - <?php echo $timeSlots->end_time;; ?></td>
                          <!-- <td  onclick="myFunction()"class= "bookbutton">Book now</td>           -->

                          <!-- <td class="bookbutton" onclick="bookSlot(this)">Book now</td>  -->
                        <td>  <button onclick="document.getElementById('1').style.display='block'" style="width:auto;">Book now</button></td>
                    </tr>
                <?php endforeach; ?>


                <!-- <script>
function bookSlot(button) {
  if (confirm("Do you want to book this time slot?")) {
    button.innerHTML = "Booked";
  }
}
</script>     -->
<!-- <script>
function bookSlot(button) {
  let text;
  if (confirm("Do you want to book this time slot") == true) {
    text = "Your Time slot is reserved!!";
    // add "booked" class to the clicked table cell
    button.innerHTML = "Booked";
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;
}</script> -->

               

<!-- <p id="demo"></p>

<script>
function myFunction() {
  let text;
  if (confirm("Do you want to book this time slot") == true) {
    text = "Your Time slot is reserved!!";
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;
}
</script> -->
           </table>
       </div>
   </div>
   </div>
               </div>
               <script src="bookingtimeslots.js"></script>

              
              
               <div id="1" class="modal">

   

    <div class="midwifeupdateinfo">
        <h1>Are you sure you want to book this time slot?</h1>
     
        
      <button type="submit">Yes</button>
      <button >No</button>
     
    </div>

  
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('1');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
              
</div>
                
    
