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
            <div>
                <div>
                    <h2 class="content_h1"><?php echo $data['clinic']->clinic_name; ?></h2>
                    <hr class="line">
                </div>
                <div>
                    <table>
                        <tr>
                            <th>Clinic Details</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Clinic id</td>
                            <td><?php echo $data['clinic']->id; ?></td>
                        </tr>
                        <tr>
                            <td>Clinic Name</td>
                            <td><?php echo $data['clinic']->clinic_name; ?></td>
                        </tr>
                        <tr>
                            <td>Grama Niladhari Division</td>
                            <td><?php echo $data['clinic']->gnd; ?></td>
                        </tr>
                        <tr>
                            <td>PHM Area</td>
                            <td><?php echo $data['clinic']->phm; ?></td>
                        </tr>
                        <tr>
                            <td>location Address</td>
                            <td><?php echo $data['clinic']->location; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="add">Edit clinic</button></td>
                        </tr>
                    </table>
                </div>
                <div>
                    
                </div>
            </div>

        
            
            <div class="row">
                <div class="column">
                    <table class="t1">
                        <tr>
                            <th>Doctors</th>
                            <th></th>
                            <th><a href="<?php echo URLROOT; ?>/clinics/doctor/<?php echo $data['clinic']->id; ?>"><button class="add2">Add Doctor</button></a></th>
                        </tr>
                        <tr>
                            <th>Doctor Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                        </tr>
                        <?php foreach($data['doctor'] as $doctor) : ?>
                            <tr>
                                <th><?php echo $doctor->doctor_id; ?></th>
                                <th><?php echo $doctor->name; ?></th>
                                <th><?php echo $doctor->email; ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            
                <div class="column">
                    <table>
                        <tr>
                            <th>Midwives</th>
                            <th></th>
                            <th><a href="<?php echo URLROOT; ?>/clinics/midwife/<?php echo $data['clinic']->id; ?>"><button class="add2">Add Midwife</button></a></th>
                        </tr>
                        <tr>
                            <th>Midwife ID</th>
                            <th>PHM Area</th>
                            <th>Name</th>
                        </tr>
                        <?php foreach($data['midwife'] as $midwife) : ?>
                            <tr>
                                <th><?php echo $midwife->midwife_id; ?></th>
                                <th><?php echo $midwife->phm; ?></th>
                                <th><?php echo $midwife->name; ?></th>
                            </tr>
                        <?php endforeach; ?>
                        
                    </table>
                </div>
            </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>