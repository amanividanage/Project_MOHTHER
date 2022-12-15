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
        <form action="<?php echo URLROOT; ?>/expectantRecords/password_expectant" method= "POST">
   
    <table align="center" cellpadding = "10">
        
 <tr><td><b> Sending the password <hr>
 
 <tr>
    <td>
    <label for="username">NIC </label>
    </td>
    <td><input type="text" name="username" maxlength="20" class= " <?php echo (!empty($data['nic_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo $data['sendingPassword']->nic; ?>">
    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span></td>
    </tr>

    <tr>
    <td>
    <label for="password"> Password </label>
    </td>
    <td><input type="text" name="password" maxlength="20" class= " <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span></td>
    </tr>
