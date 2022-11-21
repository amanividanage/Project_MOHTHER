<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="b">
    <div class="container_new">
        <h2>Log In</h2>
        <p>Please enter your credencials to log in</p>
        <form action="<?php echo URLROOT; ?>/admins/login" method="post">
            <div>
                <label for="identity">ID No: <sup>*</sup></label>
                <input type="text" name="identity" placeholder="Enter your ID no">
                <span><?php echo $data['identity_err']; ?></span>
            </div>
            <div>
                <label for="password">Password: <sup>*</sup></label>
                <input type="text" name="password" placeholder="Enter your password">
                <span><?php echo $data['password_err']; ?></span>  
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div> 

<?php require APPROOT . '/views/inc/footer.php'; ?>