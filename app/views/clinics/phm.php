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
            <a href="<?php echo URLROOT; ?>/clinics/info/<?php echo $data['clinics']->clinic_id; ?>" class="back"><i class="fa fa-backward"></i>Back</a>
            <br><br>
            
                <form action="<?php echo URLROOT; ?>/clinics/phm/<?php echo $data['phm']->id; ?>" method="post">
                    <h2>Add Midwives to PHM Area</h2>
                    <p>Select midwives the assign them to clinics </p>
                    <div>
                        <label for="midwife">Midwives: <sup>*</sup></label> <br>
                        <select name="midwife" id="midwife">
                            <option value="">Select a Midwife</option>
                            <?php foreach($data['midwifes'] as $midwifes) : ?>
                                <option value="<?php echo $midwifes->nic; ?>"><?php echo $midwifes->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="form-err"><?php echo $data['midwife_err']; ?></span>
                    </div> 
                    <input type="submit" value="Submit">
                </form>
                
        </div>

        
            
           

                

                

            


            
            


           
<?php require APPROOT . '/views/inc/footer.php'; ?>



