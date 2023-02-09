<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            
            
            <div class="bg-img">
                <form action="<?php echo URLROOT; ?>/users/login" method="post" class="container56">
                    <h2>Log In</h2>
                    <p>Please enter your credencials to log in</p>
                    
                    <label for="nic">NIC: <sup>*</sup></label>
                    <input type="text" name="nic" placeholder="Enter your ID no">
                    <span class="form-err"><?php echo $data['nic_err']; ?><br></span>
                    
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <span class="form-err"><?php echo $data['password_err']; ?></span>

                    <br>

                    <button type="submit" class="loginbtn1999">Login</button><br>

                    <br>

                    <a href=" <?php echo URLROOT; ?>/clinicattendees/register"> No Account? Register</a>

                    <br>
                    <br>
                </form>
            </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>



        

        

        