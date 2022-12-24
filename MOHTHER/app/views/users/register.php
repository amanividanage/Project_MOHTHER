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


    <div class= "Registration">
        <form action="<?php echo URLROOT; ?>/users/register/<?php echo $data['newexpectantRecords']->nic; ?>" method= "POST">
   
    <table align="center" cellpadding = "10">
        
 <tr><td><b> Basic Info <hr> </td></tr>


 <tr>
    <td>
    <label for="nic">NIC </label>
    </td>
    <td><input type="text" name="nic" maxlength="12" class= "form <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['newexpectantRecords']->nic; ?>">
    <span class="invalid-feedback"><?php echo $data['nic_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="name">Name </label>
    </td>
    <td><input type="text" name="name" class= "form <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['newexpectantRecords']->mname; ?>">
    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span></td>
    </tr>
    

   

    <tr>
    <td>
    <label for="height">Height in inches </label>
    </td>
    <td><input type="double" name="height" maxlength="5" class= "form <?php echo (!empty($data['height_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['height']; ?>">
    <span class="invalid-feedback"><?php echo $data['height_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="weight">Weight in Kg </label>
    </td>
    <td><input type="double" name="weight" maxlength="5" class= "form <?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['weight']; ?>">
    <span class="invalid-feedback"><?php echo $data['weight_err']; ?></span></td>
    </tr>


    <tr>
    <td>
    <label for="bloodPressure">Blood Pressure in mmHg </label>
    </td>
    <td><input type="double" name="bloodPressure" maxlength="5" class= "form <?php echo (!empty($data['bloodPressure_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['bloodPressure']; ?>">
    <span class="invalid-feedback"><?php echo $data['bloodPressure_err']; ?></span></td>
    </tr>

    
    <tr>
    <td>
    <label for="allergies">Allergies </label>
    </td>
    <td><input type="text" name="allergies" maxlength="50" class= "form <?php echo (!empty($data['allergies_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['allergies']; ?>">
    <span class="invalid-feedback"><?php echo $data['allergies_err']; ?></span></td>
    </tr>

    
    <!----- End of basic Info -------------------------------------------------------->
 
 <tr><td><b> Special Attention Facts <hr> </td></tr>


    <tr>
    <td>
    <label for="consanguinity">Consanguinity</label>
    </td>
    <td>
    <label for="opt"><select  name="consanguinity" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
     </select></label>
    </td></tr>
    
    <tr>
 <td><label for="rubellaImmunization">Rubella Immunization</label></td>
 <td><label for="opt"> <select name="rubellaImmunization" >
    <option value="Yes">Yes</option>
    <option value="No">No</option> 
    
  </select></label>
 </td>
 </tr>

 <tr>
 <td><label for="prePregnancyScreening">Pre Pregnancy Screening</label></td>
 <td> <label for="opt"><select name="prePregnancyScreening" >
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    
  </select></label>
 </td>
 </tr>

 <tr>
 <td><label for="preconceptionalFolicAcid">Preconceptional Folic Acid</label></td>
 <td> <label for="opt"><select name="preconceptionalFolicAcid">
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    
  </select></label>
 </td>
 </tr>
    
 <!--tr>
    <td>
    <label for="preconceptionalFolicAcid">Preconceptional Folic Acid </label>
    </td>
    <td><input type="text" name="preconceptionalFolicAcid" maxlength="3" class= "form <?php echo (!empty($data['preconceptionalFolicAcid_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['preconceptionalFolicAcid']; ?>">
    <span class="invalid-feedback"><?php echo $data['preconceptionalFolicAcid_err']; ?></span></td>
    </tr-->


   
    <tr>
    <td>
    <label for="subfertility">History of Subfertility </label>
    </td>
    <td><input type="text" name="subfertility" maxlength="50" class= "form <?php echo (!empty($data['subfertility_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subfertility']; ?>">
    <span class="invalid-feedback"><?php echo $data['subfertility_err']; ?></span></td>
    </tr>


    <!----- Special Attention Facts-------------------------------------------------------->
 
 <tr><td><b>Present obstetric history <hr> </td></tr>

    <tr>
    <td>
    <label for="gravidity">Gravidity </label>
    </td>
    <td><input type="int" name="gravidity" maxlength="2" class= "form <?php echo (!empty($data['gravidity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gravidity']; ?>">
    <span class="invalid-feedback"><?php echo $data['gravidity_err']; ?></span></td>
    </tr>

    
    <tr>
    <td>
    <label for="noofChildren">No of Children </label>
    </td>
    <td><input type="int" name="noofChildren" maxlength="2" class= "form <?php echo (!empty($data['noofChildren_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['noofChildren']; ?>">
    <span class="invalid-feedback"><?php echo $data['noofChildren_err']; ?></span></td>
    </tr>
    
    <tr>
    <td>Age of the youngest child</td>
    <td><input type="int" name="ageofYoungest" maxlength="2" id="12"/>
    </td>
    </tr>

    <tr>
    <td>
    <label for="lastMenstrualDate"> Last Menstrual Date </label>
    </td>
    <td><input type="Date" name="lastMenstrualDate"  class= "form <?php echo (!empty($data['lastMenstrualDate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastMenstrualDate']; ?>">
    <span class="invalid-feedback"><?php echo $data['lastMenstrualDate_err']; ?></span></td>
    </tr>
    
    <tr>
    <td>
    <label for="registrationDate">Date of Registration</label>
    </td>
    <td><input type="Date" name="registrationDate" class= "form <?php echo (!empty($data['registrationDate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['registrationDate']; ?>">
    <span class="invalid-feedback"><?php echo $data['registrationDate_err']; ?></span></td>
    </tr>
    
    <tr>
    <td>
    <label for="expectedDateofDelivery">Expected Date of Delivery </label>
    </td>
    <td><input type="Date" name="expectedDateofDelivery"  class= "form <?php echo (!empty($data['expectedDateofDelivery_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['expectedDateofDelivery']; ?>">
    <span class="invalid-feedback"><?php echo $data['expectedDateofDelivery_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="password">Password </label>
    </td>
    <td><input type="text" name="password" class= "<?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span></td>
    </tr>
    
    <tr><td> <input type="submit" name="Submit" class="myButton"></input></td></tr>



 
</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
