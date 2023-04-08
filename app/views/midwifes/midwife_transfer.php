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
            <a href="<?php echo URLROOT; ?>/clinics" class="back"><i class="fa fa-backward"></i>  Back</a>
            
            <form action="<?php echo URLROOT; ?>/midwifes/midwife_transfer/<?php echo $data['midwife']->nic; ?>" method="post">
    <h2>Transfer midwife to another clinic</h2>
    <p>Select a clinic to transfer the midwife </p>
    <div>
        <label for="newclinic">Clinics: <sup>*</sup></label> <br>
        <select name="newclinic" id="newclinic" onchange="updatePHMs(this.value)">
            <option value="">Select a clinic</option>
            <?php foreach($data['clinics'] as $clinics) : ?>
                <option value="<?php echo $clinics->id; ?>"><?php echo $clinics->clinic_name; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="form-err"><?php echo $data['newclinic_err']; ?></span>

        <?php if (!empty($data['phms'])) : ?>

            <label for="newphm">PHMs: <sup>*</sup></label> <br>
            <select name="newphm" id="newphm">
                <option value="">Select a PHM</option>
                <?php foreach($data['phms'] as $phms) : ?>
                    <?php if ($phms->clinic_id == $data['newclinic']) : ?>
                        <!-- <option value="<!?php echo $phms->id; ?>"><!?php echo $phms->phm; ?></option> -->
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <span class="form-err"><?php echo $data['newphm_err']; ?></span>
            <?php else : ?>
            <p>No PHMs available for this clinic</p>
        <?php endif; ?>

    </div> 
    <input type="submit" value="Submit">
</form>



                
        </div>

        
            
       
        <script>
function updatePHMs(clinic_id) {
    var phmSelect = document.getElementById("newphm");
    var phms = <?php echo json_encode($data['phms']); ?>;
    var phmOptions = "<option value=''>Select a PHM</option>";

    for (var i = 0; i < phms.length; i++) {
        if (phms[i].clinic_id == clinic_id) {
            phmOptions += "<option value='" + phms[i].id + "'>" + phms[i].phm + "</option>";
        }
    }

    phmSelect.innerHTML = phmOptions;
}
</script>

                

                

            


            
            

            <!-- <script>
                function reload() {
                var x = document.getElementById("newclinic").value;
                document.getElementById("newclinic").value = x;
                // document.getElementById("demo").innerHTML = "You selected: " + x;
                // document.write(x);
                self.location='<!?php echo URLROOT; ?>/midwifes/midwife_transfer/<!?php echo $data['midwife']->nic; ?>/' + x;
                }
            </script>  -->
           
<?php require APPROOT . '/views/inc/footer.php'; ?>





