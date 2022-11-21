<?php require APPROOT . '/views/inc/header.php'; ?>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">
            
            
            <div class="container_new">
                <h2>User Log In</h2>
                <p>Please enter your credencials to log in</p>
                <form action="<?php echo URLROOT; ?>/clinicattendees/login" method="post">
                    <div>
                        <label for="nic">ID No: <sup>*</sup></label>
                        <input type="text" name="nic" placeholder="Enter your ID no">
                        <span class="form-err"><?php echo $data['nic_err']; ?></span>
                    </div>
                    <div>
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <span class="form-err"><?php echo $data['password_err']; ?></span>  
                    </div>
                    <div>
                        <div>
                            <input type="submit" value="Login">
                        </div>
                        <div>
                            <a href="<?php echo URLROOT; ?>/clinicattendees/register">No Account? Register</a>
                        </div>
                    </div>
                    
                </form>
            </div>
    

<?php require APPROOT . '/views/inc/footer.php'; ?>