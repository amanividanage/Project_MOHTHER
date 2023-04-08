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
    
        <a href="<?php echo URLROOT; ?>/doctorRecords/expectantmothers" class="back"><i class="fa fa-backward"></i>  Back</a>
            <br>
            
                <h2 class="content_h1">Monthly Records - <?php echo $data['child']->name; ?>  ->  Date - <?php echo $data['midwiferecords']->date; ?></h2><br>
                <!-- <h2 class="content_h1">Date - <!?php echo $data['midwiferecords']->date; ?></h2> -->
                <!-- <a href="<!?php echo URLROOT; ?>/childrens/add/<!?php echo $data['mother']->nic; ?>"><button class="add">Add Child</button></a>  -->
            
            

            <div class="mine">
                <div class="card">
                    <div class="container">
                        <table>
                            <thead>
                        <tr>
                            <th colspan=2>Midwife Records</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Skin color:</td>
                            <td><?php echo $data['midwiferecords']->skin; ?></td>
                        </tr>
                        <tr>
                            <td>Eye sight: </td>
                            <td><?php echo $data['midwiferecords']->eye; ?></td>
                        </tr>
                        <tr>
                            <td>Body temperature  (in Celsius):</td>
                            <td><?php echo $data['midwiferecords']->temp; ?> </td>
                        </tr>
                        <tr>
                            <td>Nature of the umbilicus:</td>
                            <td><?php echo $data['midwiferecords']->umbilicus; ?></td>
                        </tr>
                        <tr>
                            <td>Current weight(In Kg): </td>
                            <td><?php echo $data['midwiferecords']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>Other Complications (If any):</td>
                            <td><?php echo $data['midwiferecords']->other; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>

                <div class="card">
                    <div class="container">
                        <table>
                            <thead>
                        <tr>
                            <th colspan=2>Doctor Records</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Eye size difference:</td>
                            <td><?php echo $data['doctorrecords']->eye1; ?></td>
                        </tr>
                        <tr>
                            <td>Cataract: </td>
                            <td><?php echo $data['doctorrecords']->eye2; ?></td>
                        </tr>
                        <tr>
                            <td>Corneal opacity:</td>
                            <td><?php echo $data['doctorrecords']->eye3; ?> </td>
                        </tr>
                        <tr>
                            <td>Eye movement disorders:</td>
                            <td><?php echo $data['doctorrecords']->eye4; ?></td>
                        </tr>
                        <tr>
                            <td>Hearing Disorders: </td>
                            <td><?php echo $data['doctorrecords']->leftear; ?></td>
                        </tr>
                        <tr>
                            <td>Right ear:</td>
                            <td><?php echo $data['doctorrecords']->rightear; ?></td>
                        </tr>
                        <tr>
                            <td>Dental health:</td>
                            <td><?php echo $data['doctorrecords']->teeth1; ?></td>
                        </tr>
                        <tr>
                            <td>Dental cavities: </td>
                            <td><?php echo $data['doctorrecords']->teeth2; ?></td>
                        </tr>
                        <tr>
                            <td>Heart disease:</td>
                            <td><?php echo $data['doctorrecords']->heart; ?> </td>
                        </tr>
                        <tr>
                            <td>Lungs:</td>
                            <td><?php echo $data['doctorrecords']->lungs; ?></td>
                        </tr>
                        <tr>
                            <td>Hip joint: </td>
                            <td><?php echo $data['doctorrecords']->hip; ?></td>
                        </tr>
                        <tr>
                            <td>Congenital disorders:</td>
                            <td><?php echo $data['doctorrecords']->other1; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>
            
            </div>

            <br>
            <br>
            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


