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
            <a href="<?php echo URLROOT; ?>/admins/profile" class="back"><i class="fa fa-backward"></i>Back</a>
                <div class="container_new">
                    <h2 class="content_h2">Change Password</h2>
                    <form action="<?php echo URLROOT; ?>/admins/changepassword" method="post">
                        <div>
                            <label for="current-password" class="form_font">Current Password: <sup>*</sup></label>
                            <input type="password" id="current-password" name="current-password" placeholder="Enter current password here..." value="<?php echo $data['current-password']; ?>">
                            <span class="form-err"><?php echo $data['current-password_err']; ?></span>
                        </div>
                        <div>
                            <label for="new-password" class="form_font">New Password: <sup>*</sup></label>
                            <input type="password" name="new-password" placeholder="Enter new password here..." value="<?php echo $data['new-password']; ?>">
                            <span class="form-err"><?php echo $data['new-password_err']; ?></span>
                        </div>
                        <div>
                            <label for="confirm-password" class="form_font">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm-password" placeholder="Enter confirm password here..." value="<?php echo $data['confirm-password']; ?>">
                            <span class="form-err"><?php echo $data['confirm-password_err']; ?></span>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>