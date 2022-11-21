<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/clinics" class="back"><i class="fa fa-backward"></i>Back</a>
    <div class="container_new">
        <h2>Create Clinic</h2>
        <p>Create a clinic with this form</p>
        <form action="<?php echo URLROOT; ?>/clinics/add" method="post">
            <div>
                <label for="clinic_name">Name: <sup>*</sup></label>
                <input type="text" id="clinic_name" name="clinic_name" placeholder="Enter your name... ">
                <span><?php echo $data['clinic_name_err']; ?></span>
            </div>
            <div>
                <label for="gnd">Grama Niladhari Division: <sup>*</sup></label>
                <select name="gnd" id="gnd" required>
                    <option value="" selected hidden>Grama Niladhari division</option>
                    <option value="GND-1">GND-1</option>
                    <option value="GND-2">GND-2</option>
                    <option value="GND-3">GND-3</option>
                    <option value="GND-4">GND-4</option>
                </select>
                <span><?php echo $data['gnd_err']; ?></span>
            </div> 
            <div>
                <label for="phm">PHM Area: <sup>*</sup></label>
                <select name="phm" id="phm" required>
                    <option value="">Select Public Health Midwife Area</option>
                    <option value="PHM-1">PHM-1</option>
                    <option value="PHM-2">PHM-2</option>
                    <option value="PHM-3">PHM-3</option>
                    <option value="PHM-4">PHM-4</option>
                </select>
                <span><?php echo $data['phm_err']; ?></span>
            </div>
            <div>
                <label for="location">Location: <sup>*</sup></label>
                <input type="text" name="location" placeholder="Enter your location.. ">
                <span><?php echo $data['location_err']; ?></span>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>