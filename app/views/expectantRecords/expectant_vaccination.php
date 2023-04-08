<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
    <div class="content">
        <a href="<?php echo URLROOT; ?>/expectantRecords/expectnatmotherlist" class="back"><i class="fa fa-backward"></i>Back</a>
            
        <div>
                <div>
                    <h2 class="content_h1">Vaccination - <?php echo $data['mother']->name; ?></h2>
                    <h2 class="content_h2">Immunization Vaccines</h2>
                </div>
   
            </div>

            <br>
            <br>
            <br>
 
                    <form action="<?php echo URLROOT; ?>/expectantRecords/expectant_vaccination/<?php echo $data['mother']->nic; ?>/<?php echo $data['vaccine']->id; ?>" method="post">
                        <!-- <h4>Given the Vaccination? </h4> -->
                        <div>
                            <label for="batch" class="form_font">Enter Vaccination Batch No here: <sup>*</sup></label>
                            <input type="text" id="batch" name="batch" placeholder="Enter batch no here... ">
                            <span class="form-err"><?php echo $data['batch_err']; ?></span> 
                        </div>
                        <input type="submit" value="Submit">
                    </form>

            
            

            
                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>