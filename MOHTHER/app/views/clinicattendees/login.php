<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<!?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><!!?php echo SITENAME; ?></title>
</head>
<body>
    <!?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <!?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">
            
            
            <div class="container_new">
                <h2>User Log In</h2>
                <p>Please enter your credencials to log in</p>
                <form action="<!?php echo URLROOT; ?>/clinicattendees/login" method="post">
                    <div>
                        <label for="nic">ID No: <sup>*</sup></label>
                        <input type="text" name="nic" placeholder="Enter your ID no">
                        <span class="form-err"><!?php echo $data['nic_err']; ?></span>
                    </div>
                    <div>
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <span class="form-err"><!?php echo $data['password_err']; ?></span>  
                    </div>
                    <div>
                        <div>
                            <input type="submit" value="Login">
                        </div>
                        <div>
                            <a href="<!?php echo URLROOT; ?>/clinicattendees/register">No Account? Register</a>
                        </div>
                    </div>
                    
                </form>
            </div>
    

<!?php require APPROOT . '/views/inc/footer.php'; ?> -->

<DOCTYPE html>
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


    <div class="content_login">
        <section class="section1">
            <div class="mainloginpage"> <img src="../img/bg.png" alt="">
            </div>

            <div class="container_login">

                <br><br>
                <div class="log_bg">

                    <br>
                    <br>
                    <!-- <p>Please enter your credencials to log in</p> -->




                    <form action="<?php echo URLROOT; ?>/clinicattendees/login" method="post">
                        <div class="loghead">

                            <h2>Clinicattendee Login</h2>
                        </div>
                        

                        <div class="loginpage">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <label for="nic">ID No: <sup>*</sup></label>
                            <input type="text" name="nic" placeholder="Enter your ID no">
                            <span class="form-err"><?php echo $data['nic_err']; ?></span>
                        </div>



                        <div class="loginpage">
                            <i class="fa fa-lock" aria-hidden="true"> </i>
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" placeholder="Enter your password">
                            <span class="form-err"><?php echo $data['password_err']; ?></span>
                        </div>


                        <div class="loginbtn">
                            <input type="submit" value="Login">
                        </div>

                        

                        <a href=" <?php echo URLROOT; ?>/clinicattendees/register"> No
                            Account? Register</a>



                    </form>

                </div>
            </div>


        </section>

    </div>

    
    <?php require APPROOT . '/views/inc/footer.php'; ?>