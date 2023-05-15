<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- full calendar CDN  -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>

    <div class="content">
    <a href="<?php echo URLROOT; ?>/expectantRecords/info/<?php echo $data['info']->nic; ?>" class="back"><i class="fa fa-backward"></i>Back</a>

    <div class= "adddailyrecords">
        <form action="<?php echo URLROOT; ?>/expectantRecords/add/<?php echo  $data['info']->nic; ?>" method= "POST">
   <!--?php echo $data['info']->nic; ?-->
    <table align="center" cellpadding = "10">
        
 <tr><td><b> Monthly Records <hr>
 
 <tr>
    <td>
    <label for="nic">NIC </label>
    </td>
    <td><input type="text" name="nic" maxlength="20" class= " <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['info']->nic; ?>">
    <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span></td>
    </tr>
    <tr>
    <td>
    <label for="nic">Gravidity </label>
    </td>
    <td><input type="text" name="gravidity" maxlength="20" class= " <?php echo (!empty($data['gravidity_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['info']->gravidity; ?>">
    <span class="invalid-feedback"><?php echo $data['gravidity_err']; ?></span></td>
    </tr>


    <tr>
    <td>
    <label for="weight">Weight </label>
    </td>
    <td><input type="double" name="weight" maxlength="10" class= "<?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['weight']; ?>">
    <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span></td>
    </tr>


    <tr>
    <td>
    <label for="bp">Blood Pressure</label>
    </td>
    <td><input type="double" name="bp" class= "<?php echo (!empty($data['bp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['bp']; ?>">
    <span class="invalid-feedback"><?php echo $data['bp_err']; ?></span></td>
    </tr>
    
    
    
    <!----- End of basic Info -------------------------------------------------------->
 
 <tr><td><b> Monthly Supplements <hr> </td></tr>
<hr>

    <tr>
    <td>
    <label for="ironorForlate">Iron/Forlate</label>
    </td>
    <td>
    <label for="opt"><select  name="ironorForlate" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>
    
    <tr>
    <td>
    <label for="vitaminC">Vitamin C</label>
    </td>
    <td>
    <label for="opt"><select  name="vitaminC" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>

    <tr>
    <td>
    <label for="calcium"> Calcium</label>
    </td>
    <td>
    <label for="opt"><select  name="calcium" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>

   
    <tr>
    <td>
    <label for="antimarialDrugs"> Antimarial Drugs</label>
    </td>
    <td>
    <label for="opt"><select  name="antimarialDrugs" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>
   
    <tr>
    <td>
    <label for="triposha"> Triposha</label>
    </td>
    <td>
    <label for="opt"><select  name="triposha" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>

    <tr>
    <td>
    <label for="nextAppointmentDate">Next Appointment Date </label>
    </td>
    <td><input type="Date" name="nextAppointmentDate"  class= "form <?php echo (!empty($data['nextAppointmentDate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nextAppointmentDate']; ?>" min="<?php echo date('Y-m-d'); ?>">
    <span class="invalid-feedback"><?php echo $data['nextAppointmentDate_err']; ?></span></td>
    </tr>

    <tr><td> <input type="submit" name="Submit" class="myButton"></input></td></tr>

</div>
    
</div>
    
   
 
</form>
<div class= "calendarcontent_form">
<!-- <div class ="calendar-container-form"> -->
<div id ="calendar">
   

</div>
<script src="<?= URLROOT ?>/js/maternityCalendar.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
