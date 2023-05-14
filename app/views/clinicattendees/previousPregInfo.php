<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>

    <div class="content">

    <a href="<?php echo URLROOT; ?>/expectantRecords/expectnatmotherlist" class="back"><i class="fa fa-backward"></i>Back</a>
            <br>
            <div class="report">
                <h2 class="content_h1"><?php echo $data['info']->mname; ?> - Previous Reports</h2>
                <!-- <a href="<!?php echo URLROOT; ?>/childrens/add/<!?php echo $data['mother']->nic; ?>"><button class="add">Add Child</button></a>  -->
            </div>
            

            <div class="mine">
                    <div class="card">
                        <div class="container">
                            <table>
                            <tr>
                                <th colspan=3>Basic Info</th>
                                <!-- <th></th>
                                <th></th> -->
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $data['info']->mname; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><?php echo $data['info']->mage; ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Gravidity</td>
                                <td><!?php echo $data['info']->gravidity; ?> </td>
                            </tr> -->
                            <tr>
                                <td>Level of Education</td>
                                <td><?php echo $data['info']->mlevelofeducation; ?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td><?php echo $data['info']->moccupation; ?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td><?php echo $data['info']->mcontactno; ?></td>
                            </tr>
                            <tr>
                                    <th colspan=3>Children </th>
                                    <!-- <th colspan=2><a href="<!?php echo URLROOT; ?>/childrens_expectant/add/<!?php echo $data['info']->nic; ?>"><button class="button1">Add Child</button></a></th> -->
                                </tr>
                                <?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><?php echo $children->child_id; ?></td>
                                        <td><?php echo $children->name; ?></td>
                                        <td><a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table> 
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
   
                <div>
                    

                <div class="card2">
    <div class="container">
        <div>
            <h3 class="content_h2">Previous Pregnancy Details</h3>
            <?php
                if ($data['existing']) {
                    for ($i = 1; $i < $data['max_gravidity']; $i++) {
                        echo '<a href="'.URLROOT.'/clinicattendees/infoprevious/'.$i.'"><button class="button2">Pregnancy '.$i.'</button></a>';
                    }
                } else {
                    for ($i = 1; $i <= $data['max_gravidity']; $i++) {
                        echo '<a href="'.URLROOT.'/clinicattendees/infoprevious/'.$i.'"><button class="button2">Pregnancy '.$i.'</button></a>';
                    }
                }
            ?>
            
        </div>
    </div>
</div>

                  
                    </div>
                </div>

            </div>    

           
                   
                </div>
                <br>
                <br>

            </div>
 

        

    
        <?php require APPROOT . '/views/inc/footer.php'; ?>