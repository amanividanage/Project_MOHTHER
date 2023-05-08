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

            <div class= "deliveredpage">
            
                <form action="<?php echo URLROOT; ?>/expectantRecords/delivered/<?php echo  $data['info']->nic; ?>" method= "POST">
                    <div>
                    <table align="center" cellpadding = "10">
        
                        <tr>
                            <td><b><h2>Moving to Delivered/Parent List</h2>  <hr>
                        <tr>
    <td>
    <label for="nic">NIC </label>
    </td>
    <td><input type="text" name="nic" maxlength="20" class= " <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['info']->nic; ?>">
    <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span></td>

    <td>
    <label for="name">Name </label>
    </td>
    <td><input type="text" name="name" maxlength="20" class= " <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->mname; ?>">
   </td>
    </tr>

    
   

    <tr>
    <td>
    <label for="phm">PHM </label>
    </td>
    <td><input type="text" name="phm" maxlength="20" class= " <?php echo (!empty($data['phm_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['info']->phm; ?>">
   </td>

   <td>
    <label for="nochildren">No of children </label>
    </td>
    <td><input type="text" name="nochildren" maxlength="20" class= " <?php echo (!empty($data['nochildren_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['info']->noofChildren; ?>">
   </td>
    </tr>



    <tr>
    <td>
    <label for="levelofeducation">Level of Education</label>
    </td>
    <td><input type="text" name="levelofeducation" maxlength="20" class= " <?php echo (!empty($data['levelofeducation_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->mlevelofeducation; ?>">
   </td>

   <td>
    <label for="occupation">Occupation </label>
    </td>
    <td><input type="text" name="occupation" maxlength="20" class= " <?php echo (!empty($data['occupation_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->moccupation; ?>">
   </td>
    </tr>

    

    <tr>
    <td>
    <label for="age">Age </label>
    </td>
    <td><input type="text" name="age" maxlength="20" class= " <?php echo (!empty($data['age_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->mage; ?>">
   </td>

   <td>
    <label for="contactno">Contact No </label>
    </td>
    <td><input type="text" name="contactno" maxlength="20" class= " <?php echo (!empty($data['age_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->mcontactno; ?>">
</td>
    </tr>

    
    <tr>
    <td>
    <label for="address">Address</label>
    </td>
    <td><input type="text" name="address" maxlength="20" class= " <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->address; ?>">
</td>



<td>
    <label for="email">Email</label>
    </td>
    <td><input type="text" name="email" maxlength="20" class= " <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['infoOfRegistrant']->memail; ?>">
</td>
    </tr>

    <tr>
        <td>
            <label for="mother_safe"><b><i>Is the mother safe?</i></b></label>
        </td>
        <td>
            <input type="checkbox" id="mother_safe" name="mother_safe" value="yes">
        </td>

        <td>
            
        </td>
        <td>
            
        </td>
    </tr>

    <!-- <tr>
        <td>
            <label for="mother_safe"><b><i>Is the mother safe?</i></b></label>
            <input type="checkbox" id="mother_safe" name="mother_safe" value="yes">
        </td>
    
    </tr> -->
</table>
    <!-- <!?php
if(isset($_POST['mother_safe']) && $_POST['mother_safe'] == 'yes') {
?> -->
<div id="delivery_info" style="display:none;">
<table>
</div>
<tr><td><b>To be filled by Midwife 

    <tr>
    <td>
    <label for="weekscompleted">Weeks Completed</label>
    </td>
    <td><input type="text" name="weekscompleted" maxlength="20" class= " <?php echo (!empty($data['weekscompleted_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['weekscompleted']; ?>">
    <span class="invalid-feedback"><?php echo $data['weekscompleted_err']; ?></span></td>
    <td>
    <label for="miscarriage">Miscarriage </label>
    </td>
    <td>
    <label for="opt"><select  name="miscarriage" >
    <option value="No">No</option> 
    <option value="Yes">Yes</option>
   
     </select></label>
    </td>
    </tr>


    <tr>
    <td>
    <label for="weight">Weight </label>
    </td>
    <td><input type="double" name="weight" maxlength="5" class= "<?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['weight']; ?>">
    <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span></td>

    <td>
    <label for="bp">Blood Pressure</label>
    </td>
    <td><input type="double" name="bp" class= "<?php echo (!empty($data['bp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['bp']; ?>">
    <span class="invalid-feedback"><?php echo $data['bp_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="placeofDelivery">Place of Delivery</label>
    </td>
    <td><input type="text" name="placeofDelivery" maxlength="20" class= " <?php echo (!empty($data['placeofDelivery_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['placeofDelivery']; ?>">
    <span class="invalid-feedback"><?php echo $data['placeofDelivery_err']; ?></span></td>

    <td>
    <label for="modeofDelivery">Mode of Delivery</label>
    </td>
    <td>
    <label for="opt"><select  name="modeofDelivery"  placeholder='Please specify the type of delivery' >
      
    <option value="Yes">Please specify the type of delivery</option>
    <option value="Yes">Vaginal Delivery</option>
    <option value="No">Ceasarean Birth</option>
    <option value="No">VBAC</option> 
    <option value="No">Assisted Vaginal Delivery</option>
     </select></label>
    </td>
    </tr>

  
    <tr>
    <td>
    <label for="postnatalcomplication">Postnatal complication(specify)</label>
    </td>
    <td><input type="text" name="postnatalcomplication" maxlength="225" class= " <?php echo (!empty($data['postnatalcomplication_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['postnatalcomplication']; ?>">
    <span class="invalid-feedback"><?php echo $data['postnatalcomplication_err']; ?></span></td>

    <td>
    <label for="symptoms">Symptoms</label>
    </td>
    <td><input type="text" name="symptoms" maxlength="225" class= " <?php echo (!empty($data['symptoms_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['symptoms']; ?>">
    <span class="invalid-feedback"><?php echo $data['symptoms_err']; ?></span></td>
    </tr>


    <tr>
    <td>
    <label for="diabetes">Diabetes Present after delivery?</label>
    </td>
    <td>
    <label for="opt"><select  name="diabetes" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>

    </tr>
    </table>
</div>

    <!-- <!?php
} else {
    // do nothing
}
?> -->
<br>
    <tr><td> <input type="submit" name="Submit" class="myButton"></input></td></tr>
   
   

</div>
</div>
</form>
<!-- From here the next form should start-->


  

</div>
    
<script>
  var checkbox = document.getElementById('mother_safe');
  var deliveryInfo = document.getElementById('delivery_info');

  checkbox.addEventListener('click', function() {
    if (this.checked) {
      deliveryInfo.style.display = 'block';
    } else {
      deliveryInfo.style.display = 'none';
    }
  });
</script>  
 


<?php require APPROOT . '/views/inc/footer.php'; ?>
