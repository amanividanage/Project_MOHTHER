<?php require APPROOT . '/views/inc/header.php'; ?>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">
            <a href="<?php echo URLROOT; ?>/doctors" class="back"><i class="fa fa-backward"></i>Back</a>
            <div class="container_new">
                <h2>Add Doctor</h2>
                <p>Add a doctor to the system with this form</p>
                <form action="<?php echo URLROOT; ?>/doctors/add" method="post">
                    <div>
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" id="name" name="name" placeholder="Enter name here... ">
                        <span class="form-err"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div>
                        <label for="identity">ID No: <sup>*</sup></label>
                        <input type="text" name="identity" placeholder="Enter ID number here... ">
                        <span class="form-err"><?php echo $data['identity_err']; ?></span>
                    </div>
                    <div>
                        <label for="phone">Phone No: <sup>*</sup></label>
                        <input type="text" name="phone" placeholder="Enter phone number here... ">
                        <span class="form-err"><?php echo $data['phone_err']; ?></span>
                    </div>
                    <div>
                        <label for="email">E-mail: <sup>*</sup></label>
                        <input type="email" name="email" placeholder="Enter E-mail here... ">
                        <span class="form-err"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div>
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="text" name="password" placeholder="Enter password here... ">
                        <span class="form-err"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div>
                        <label for="clinic">Clinic: <sup>*</sup></label>
                        <select name="clinic" id="clinic">
                            <?php foreach($data['clinics'] as $clinic) : ?>
                                <option value="<?php echo $clinic->id; ?>"><?php echo $clinic->clinic_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="form-err"><?php echo $data['clinic_err']; ?></span>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>