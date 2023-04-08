<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_doctor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_doctor.php' ; ?>
    <div class="content">
        <a href="<?php echo URLROOT; ?>/expectantRecords" class="back"><i class="fa fa-backward"></i>Back</a>
    
    <div class="expectant">
        <div>
            <h2 class="content_h1">Children</h2>
            <hr class="line">
        </div>
        <div>
            <table>
                <tr>
                    <th>Details</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Child Id</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Date of registration</th>
                    <th></th>
                </tr>
                <?php foreach($data['children'] as $children):?>
                    <tr>
                    <th><?php echo $children->child_id; ?></a> </th>
                        <td><?php echo $children->name; ?></td>
                        <td><?php echo $children->dob; ?></td>     
                        <td><?php echo $children->date; ?></td>              
                        
                        <td><a href="<?php echo URLROOT; ?>/doctorRecords/child/<?php echo $children->child_id; ?>" class="more1999"> More Info </a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>