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

        <div> 
           <h2 class="content_h1">Profile</h2>
           <hr class="line">
       </div>
       <div class= "newregdetails">
       <div>
                        <!-- <a href="<!?php echo URLROOT; ?>/children"><button class="add">Edit Profile Photo</button></a> -->
                    </div>
                </div>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo $data['midwifeprofileinfo']->name; ?></td>
            </tr>
            <tr>
                <th>Employee id</th>
                <td><?php echo $data['midwifeprofileinfo']->midwife_id; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $data['midwifeprofileinfo']->email; ?></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><?php echo $data['midwifeprofileinfo']->phone; ?></td>
            </tr>
            <tr>
                <th>Clinic No</th>
                <td><?php echo $data['phm']->clinic; ?></td>
            </tr>
            <tr>
                <th>PHM Area</th>
                <td><?php echo $data['phm']->phm; ?></td>
            </tr>
          
          
        </table>

        <button onclick="document.getElementById('1').style.display='block'" style="width:auto;">Edit Account info</button>
          <!--<div>
           <a href="<!?php echo URLROOT; ?>/midwifes/updateprofile"><button class="add">Edit Account info</button></a>
          </div-->

          <div class= "newregdetails">
            <table class= "">
                <tr>
                    <th>Security and Login</th>
                    
                </tr>
                <tr>
                <th>  <div>
           <!--<a href="<!?php echo URLROOT; ?>/children"><button class="changepassword">Change Password</button></a-->
          </div></th>
                </tr>
                
</div>
<div id="1" class="modal">
<form class="modal-content animate" action="<?php echo URLROOT; ?>/expectantRecords/midwife_profile" method="post">
 
   

    <div class="midwifeupdateinfo">
        <h2>Change the info</h2>
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value='<?php echo $data['midwifeprofileinfo']->email; ?>'>

      <label for="psw"><b>Contact No</b></label>
      <input type="text" placeholder="Enter Password" name="phone"  value='<?php echo $data['midwifeprofileinfo']->phone; ?>' >
        
      <button type="submit">Submit</button>
     
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
</div>
