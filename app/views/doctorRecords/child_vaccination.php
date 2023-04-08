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
    
    <a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $data['child']->child_id; ?>" class="back"><i class="fa fa-backward"></i>Back</a>
            <div>
                <div>
                    <h2 class="content_h1">Vaccination - <?php echo $data['child']->name; ?></h2>
                    <h2 class="content_h2">Immunization Vaccines</h2>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Months</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['vaccines'] as $vaccines) : ?>
                                <tr>
                                    <td><?php echo $vaccines->months; ?> months completed</td>
                                    <td><?php echo $vaccines->vaccine; ?></td>
                                    <td>


                                        <?php

                                            $found = false;
                                            if ($data['given_vaccines']) {
                                                foreach ($data['given_vaccines'] as $given_vaccines) {
                                                    if ($vaccines->id == $given_vaccines->vaccination_id) {
                                                        echo 'Already given'; // print the vaccine name along with the message
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                                if (!$found) {
                                                    echo 'Not given'; // print the vaccine name along with the message
                                                }
                                            } else {
                                                echo 'Not given';
                                            }

                                        ?>

                  
                                    </td>    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>

            <br>
            <br>
            <br>

            

            

            


            
            
            
               
            
            

            
        
        </div>

        
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


