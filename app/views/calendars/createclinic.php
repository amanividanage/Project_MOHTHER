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

    <div class= "adddailyrecords">
    
        <form action="<?php echo URLROOT; ?>/calendars/createclinic/<?php echo  $data['clinic']->gnd; ?>" method= "POST">
   <!--?php echo $data['info']->nic; ?-->
    <table align="center" cellpadding = "10">
        
 <tr><td><b> Scheduling the monthly clinics <hr>
 
 <tr>
    <td>
    <label for="gnd"> Clinic </label>
    </td>
    <td><input type="text" name="gnd" maxlength="20" class= " <?php echo (!empty($data['id_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['clinic']->gnd; ?>">
    <span class="invalid-feedback"><?php echo $data['gnd_err']; ?></span></td>
    </tr>

 <tr>
    <td>
    <label for="title"> Title </label>
    </td>
    <td><input type="text" name="title" maxlength="20" class= " <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['clinic_date']; ?>">
    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="clinic_date"> Clinic Date </label>
    </td>
    <td><input type="date" name="clinic_date" maxlength="20" class= " <?php echo (!empty($data['clinic_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['clinic_date']; ?>" min="2023-05-15">
    <span class="invalid-feedback"><?php echo $data['clinic_date_err']; ?></span></td>
    </tr>
    
 <tr>
    <td>
    <label for="start_event"> start_event </label>
    </td>
    <td><input type="time" name="start_event" maxlength="10" class= " <?php echo (!empty($data['start_event_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['start_event']; ?>">
    <span class="invalid-feedback"><?php echo $data['start_event_err']; ?></span></td>
    </tr>
    
 <tr>
    <td>
    <label for="end_event"> end_event </label>
    </td>
    <td><input type="time" name="end_event" maxlength="10" class= " <?php echo (!empty($data['end_event_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['end_event']; ?>">
    <span class="invalid-feedback"><?php echo $data['end_event_err']; ?></span></td>
    </tr>
    <tr>
    <td>
    <label for="duration"> duration </label>
    </td>
    <td><input type="int" name="duration" maxlength="10" class= " <?php echo (!empty($data['duration_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['duration']; ?>">
    <span class="invalid-feedback"><?php echo $data['duration_err']; ?></span></td>
    </tr>
    <tr><td> <input type="submit" name="Submit" class="myButton"></input></td></tr>

   

   

</div>
    
</div>
    
   
 
</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
