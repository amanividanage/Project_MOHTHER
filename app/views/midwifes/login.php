<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <div class=b"">
                <div class="home_content">
        <div class="content">
            <img src="" alt="">
            <br>
            <br>
            <br>
            <br>
            <div class="container_newmidwife">
                <h2>Midwife Log In</h2>
                <br>
                <p>Please enter your credencials to log in</p>
                <form action="<?php echo URLROOT; ?>/midwifes/login" method="post">
                    <div>
                        <label for="nic"> ID No: <sup>*</sup></label>
                        <input type="text" name="nic" placeholder="Enter your ID no">
                        <span class="form-err"><?php echo $data['nic_err']; ?></span>
                    </div>
                    <div>
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <span class="form-err"><?php echo $data['password_err']; ?></span>  
                    </div>
                    <div>
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>