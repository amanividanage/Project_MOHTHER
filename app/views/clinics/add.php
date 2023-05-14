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
                        <input type="text" id="clinic_name" name="clinic_name" placeholder="Enter clinic name... " value="<?php echo $data['clinic_name']; ?>">
                        <span class="form-err"><?php echo $data['clinic_name_err']; ?></span>
                    </div>
                    <div>
                        <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                        <select name="gnd" id="gnd" value="<?php echo $data['gnd']; ?>">
                            <option value="" selected hidden>Grama Niladhari division</option>
                            <option value="Kalalgoda">Kalalgoda</option>
                            <option value="Thalawathugoda West">Thalawathugoda West</option>
                            <option value="Thalawathugoda East">Thalawathugoda East</option>
                            <option value="Kottawa South">Kottawa South</option>
                            <option value="Kottawa East">Kottawa East</option>
                            <option value="Kottawa City">Kottawa City</option>
                            <option value="Kottawa North">Kottawa North</option>
                            <option value="Kottawa  West">Kottawa  West</option>
                            <option value="Liyanagoda">Liyanagoda</option>
                            <option value="Pragathipura">Pragathipura</option>
                            <option value="Rukmale East">Rukmale East</option>
                            <option value="Rukmale West">Rukmale West</option>
                            <option value="Mirihana North">Mirihana North</option>
                            <option value="Mirihana South">Mirihana South</option>
                        </select>
                        <span class="form-err"><?php echo $data['gnd_err']; ?></span>
                    </div> 
                    <div class="form-row">
                        <div class="form-group">
                            <label for="child_clinic_date">Child Clinic date: <sup>*</sup></label>
                            <select name="child_clinic_date" id="child_clinic_date" value="<?php echo $data['child_clinic_date']; ?>">
                                <option value="" selected hidden>Select a date for the clinic</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            <span class="form-err"><?php echo $data['child_clinic_date_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="maternity_clinic_date">Maternity Clinic date: <sup>*</sup></label>
                            <select name="maternity_clinic_date" id="maternity_clinic_date" value="<?php echo $data['maternity_clinic_date']; ?>">
                                <option value="" selected hidden>Select a date for the clinic</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            <span class="form-err"><?php echo $data['maternity_clinic_date_err']; ?></span>
                        </div>
                    </div>
                    <div>
                        <label for="location">Address: <sup>*</sup></label>
                        <input type="text" name="location" placeholder="Enter the address.. " value="<?php echo $data['location']; ?>">
                        <span class="form-err"><?php echo $data['location_err']; ?></span>
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>