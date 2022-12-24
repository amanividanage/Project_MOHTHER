<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife_children.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
        <div class="content">
        <a href="<?php echo URLROOT; ?>/childrens" class="back"><i class="fa fa-backward"></i>Back</a>
            <div class="align">
                <div>
                    <h2 class="content_h1">Child profile - <?php echo $data['child']->name; ?></h2>
                </div>
                
            </div>
            

            <div class="mine">
                <div class="card">
                    <div class="container">
                        <table>
                            <thead>
                        <tr>
                            <th colspan=2>Basic Info</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $data['child']->name; ?></td>
                        </tr>
                        <tr>
                            <td>Child Id</td>
                            <td><?php echo $data['child']->child_id; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php echo $data['child']->dob; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Registration </td>
                            <td><?php echo $data['child']->date; ?></td>
                        </tr>
                        <tr>
                            <td>Birth Hospital</td>
                            <td><?php echo $data['child']->hospital; ?> </td>
                        </tr>
                        <tr>
                            <td>Birth Weight</td>
                            <td><?php echo $data['child']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>Birth head circumference</td>
                            <td><?php echo $data['child']->circumference; ?></td>
                        </tr>
                        <tr>
                            <td>Birth length</td>
                            <td><?php echo $data['child']->length; ?></td>
                        </tr>
                        <tr>
                            <td>If any special Instances</td>
                            <td><?php echo $data['child']->special; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>

                <div>
                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Vaccination</h3>
                            <a href="<?php echo URLROOT; ?>/childrens/vaccination/<?php echo $data['child']->child_id; ?>"><button class="add">Vaccination</button></a>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Weight Age Chart</h3>
                            <button class="add">Weight Age Chart</button>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Age of the Child</h3>
                            <button class="add">Age</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            </div>

            <br>
            <br>

            <div>
                <div class="report">
                    <h2 class="content_h2">Monthly Reports</h2>
                    <a href="<?php echo URLROOT; ?>/childrens/report/<?php echo $data['child']->child_id; ?>"><button class="add">Add report</button></a>
                </div>
                <div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Report No</th>
                            <th>Skin color</th>
                            <th>Eye Sight</th>
                            <th>Temperature</th>
                            <th>Nature of the umbilicus</th>
                            <th>Other Complications</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['records'] as $records) : ?>
                            <tr>
                                <td><?php echo $records->date; ?></td>
                                <td><?php echo $records->reportno; ?></td>
                                <td><?php echo $records->skin; ?></td>
                                <td><?php echo $records->eye; ?></td>
                                <td><?php echo $records->temp; ?></td>
                                <td><?php echo $records->umbilicus; ?></td>
                                <td><?php echo $records->other; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </table>
                </div>
                <br>
                <br>

            </div>
            
               
            
            

            
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>