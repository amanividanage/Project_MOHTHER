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
            <div>
                <div>
                    <h1 class="content_h1">Clinics</h1>
                </div>
                <div>
                    <a href="<?php echo URLROOT; ?>/clinics/add"><button class="add">Add Clinic</button></a>
                </div>
            </div>
            <?php foreach($data['clinics'] as $clinic) : ?>
                <div class="big">
                    <div class="card">
                        <div class="container">
                            <h4><a href="<?php echo URLROOT; ?>/clinics/info/<?php echo $clinic->id; ?>"><b><?php echo $clinic->clinic_name; ?></b></a></h4>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>