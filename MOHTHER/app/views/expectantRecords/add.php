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


    <div class= "dailyrecords">
        <form action="<?php echo URLROOT; ?>/expectantRecords/add" method= "POST">
   
    <table align="center" cellpadding = "10">
        
 <tr><td><b> Monthly Records <hr> </td></tr>
 <tr>
    <td>
    <label for="nic">NIC </label>
    </td>
    <td><input type="text" name="nic" maxlength="20" class= " <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nic']; ?>">
    <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span></td>
    </tr>


 <tr>
    <td>
    <label for="reportNo">Report No </label>
    </td>
    <td><input type="int" name="reportNo" maxlength="20" class= " <?php echo (!empty($data['reportNo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reportNo']; ?>">
    <span class="invalid-feedback"><?php echo $data['reportNo_err']; ?></span></td>
    </tr>

   

    <tr>
    <td>
    <label for="date">Date </label>
    </td>
    <td><input type="Date" name="date" class= " <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date']; ?>">
    <span class="invalid-feedback"><?php echo $data['date_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="weight">Weight </label>
    </td>
    <td><input type="double" name="weight" maxlength="5" class= "<?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['weight']; ?>">
    <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span></td>
    </tr>


    <tr>
    <td>
    <label for="vaccination">Vaccination</label>
    </td>
    <td>
    <label for="opt"><select  name="vaccination" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>
    
    
    
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

    <tr><td> <input type="submit" name="Submit" class="myButton"></input></td></tr>

</div>
    
    
    
   
 
</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
