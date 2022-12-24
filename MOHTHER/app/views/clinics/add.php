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
            <a href="<?php echo URLROOT; ?>/clinics" class="back"><i class="fa fa-backward"></i>Back</a>
            <div class="container_new">
                <h2>Create Clinic</h2>
                <p>Create a clinic with this form</p>
                <form action="<?php echo URLROOT; ?>/clinics/add" method="post">
                    <div>
                        <label for="clinic_name">Name: <sup>*</sup></label>
                        <input type="text" id="clinic_name" name="clinic_name" placeholder="Enter clinic name... ">
                        <span class="form-err"><?php echo $data['clinic_name_err']; ?></span>
                    </div>
                    <div>
                        <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                        <select name="gnd" id="gnd">
                            <option value="" selected hidden>Grama Niladhari division</option>
                            <option value="GND-1">GND-1</option>
                            <option value="GND-2">GND-2</option>
                            <option value="GND-3">GND-3</option>
                            <option value="GND-4">GND-4</option>
                        </select>
                        <span class="form-err"><?php echo $data['gnd_err']; ?></span>
                    </div> 
                    <div>
                        <label for="location">Address: <sup>*</sup></label>
                        <input type="text" name="location" placeholder="Enter the address.. ">
                        <span class="form-err"><?php echo $data['location_err']; ?></span>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>