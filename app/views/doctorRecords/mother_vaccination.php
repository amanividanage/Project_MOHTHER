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
    
        <a href="<?php echo URLROOT; ?>/doctorRecords/info/<?php echo $data['mother']->nic; ?>" class="back"><i class="fa fa-backward"></i>  Back</a>
            
        <div>
                <div>
                    <h2 class="content_h1">Vaccination - <?php echo $data['mother']->name; ?></h2>
                    <h2 class="content_h2">Immunization Vaccines</h2>
                </div>
   
            </div>

            <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Gravidity</th>
                                <th>Name</th>
                                <th>Date</th>
                                <!-- <th>
                                <!?php
// Example code to check array contents
echo "<pre>";
print_r($data['buttondeactive']);
echo "</pre>";
?></th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['vaccines'] as $vaccines) : ?>
                                <tr>
                                    <td>During <?php echo $vaccines->gravidity; ?> Pregnancy</td>
                                    <td><?php echo $vaccines->vaccine; ?></td>
                                    <td>
                                    


                                        <?php
                                            $found = false;

                                            if ($data['buttondeactive']) {
                                                foreach ($data['buttondeactive'] as $buttondeactive) {
                                                    if ($vaccines->id == $buttondeactive->vaccination_id) {
                                                        echo 'Already given';
                                                        $found = true;
                                                        break;
                                                    }
                                                }
                                            }
                                            
                                            if (!$found && in_array($vaccines, $data['buttonactive'])) {
                                                echo 'Not Given';
                                            } elseif (!$found) {
                                                echo 'Not Available Yet';
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


