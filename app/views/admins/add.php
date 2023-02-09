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
            <div class="content">
                <a href="<?php echo URLROOT; ?>/admins" class="back"><i class="fa fa-backward"></i>Back</a>
                <div class="container_new">
                    <h2 class="content_h2">Add Admin</h2>
                    <p class="form_font">Give access to an Admin with this form</p>
                    <form action="<?php echo URLROOT; ?>/admins/add" method="post">
                        <div>
                            <label for="name" class="form_font">Name: <sup>*</sup></label>
                            <input type="text" id="name" name="name" placeholder="Enter name here... ">
                            <span class="form-err"><?php echo $data['name_err']; ?></span>
                        </div>
                        <div>
                            <label for="nic" class="form_font">ID No: <sup>*</sup></label>
                            <input type="text" name="nic" placeholder="Enter ID number here... ">
                            <span class="form-err"><?php echo $data['nic_err']; ?></span>
                        </div>
                        <div>
                            <label for="phone" class="form_font">Phone No: <sup>*</sup></label>
                            <input type="text" name="phone" placeholder="Enter phone number here... ">
                            <span class="form-err"><?php echo $data['phone_err']; ?></span>
                        </div>
                        <div>
                            <label for="email" class="form_font">E-mail: <sup>*</sup></label>
                            <input type="email" name="email" placeholder="Enter E-mail here... ">
                            <span class="form-err"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div>
                            <label for="password" class="form_font">Password: <sup>*</sup></label>
                            <input type="text" name="password" placeholder="Enter password here... ">
                            <span class="form-err"><?php echo $data['password_err']; ?></span>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>