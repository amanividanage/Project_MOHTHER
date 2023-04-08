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
                                <!-- <th>
                                <!?php
// Example code to check array contents
echo "<pre>";
print_r($data['buttonactive']);
echo "</pre>";
?></th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['vaccines'] as $vaccines) : ?>
                                <tr>
                                    <td><?php echo $vaccines->months; ?> months completed</td>
                                    <td><?php echo $vaccines->vaccine; ?></td>
                                    <td>
                                        <!-- <!?php if (in_array($vaccines, $data['buttondeactive'])) : ?>
                                            Already given
                                        <!?php elseif (in_array($vaccines, $data['buttonactive'])) : ?>
                                            <a href="<!?php echo URLROOT; ?>/childrens/child_vaccination/<!?php echo $data['child']->child_id; ?>/<!?php echo $vaccines->id; ?>"><button class="more1999">Give Vaccine</button></a>
                                        <!?php else : ?>
                                            Not Available Yet
                                        <!?php endif; ?> -->

                                        <!-- <!!?php if (($vaccines->id) == (foreach($data['buttondeactive'] as $buttondeactive)->vaccination_id)) : ?>
                                            Already given
                                        <!?php elseif (in_array($vaccines, $data['buttonactive'])) : ?>
                                            <a href="<!?php echo URLROOT; ?>/childrens/child_vaccination/<!?php echo $data['child']->child_id; ?>/<!?php echo $vaccines->id; ?>"><button class="more1999">Give Vaccine</button></a>
                                        <!?php else : ?>
                                            Not Available Yet
                                        <Y?php endif; ?> -->


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
                                                echo '<a href="' . URLROOT . '/childrens/child_vaccination/' . $data['child']->child_id . '/' . $vaccines->id . '"><button class="more1999">Give Vaccine</button></a>';
                                            } elseif (!$found) {
                                                echo 'Not Available Yet';
                                            }
                                        ?>

                                        <!-- <!?php
                                            foreach($data['buttondeactive'] as $buttondeactive){
                                                if ($vaccines->id == $buttondeactive->vaccination_id){
                                                    echo 'Already given';
                                                    continue;
                                                } else if (in_array($vaccines, $data['buttonactive'])) {
                                                    echo '<a href="' . URLROOT . '/childrens/child_vaccination/' . $data['child']->child_id . '/' . $vaccines->id . '"><button class="more1999">Give Vaccine</button></a>';
                                                    continue;
                                                } else {
                                                    echo 'Not Available Yet';
                                                }
                                            }
                                        
                                        ?> -->






                                        <!-- <!?php if (in_array($vaccines, $data['buttonactive'])) : ?>
                                            <a href="<!?php echo URLROOT; ?>/childrens/child_vaccination/<!?php echo $data['child']->child_id; ?>/<!?php echo $vaccines->id; ?>"><button class="more1999">Give Vaccine</button></a>
                                        <!?php else : ?>
                                            Not Available Yet
                                        <!?php endif; ?> -->
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

            

            

            <!-- The Modal -->
            <!-- <div id="myModal" class="modal">

                 Modal content -->
                <!-- <div class="modal-content">
                    <span class="close">&times;</span>
                    
                    <form action="<!?php echo URLROOT; ?>/childrens/vaccination/<!?php echo $data['child']->child_id; ?>" method="post">
                        <h4>Given the Vaccination? </h4> -->
                        <!-- <div>
                            <label for="batch" class="form_font">Enter Vaccination Batch No here: <sup>*</sup></label>
                            <input type="text" id="batch" name="batch" placeholder="Enter batch no here... ">
                            <input type="hidden" id="vaccination_id" name="vaccination_id">
                            <span class="form-err"><!?php echo $data['batch_err']; ?></span> 
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>  -->

            <!-- </div> --> 


            
            
            
               
            
            

            
        
        </div>

        

    


    <?php require APPROOT . '/views/inc/footer.php'; ?>
