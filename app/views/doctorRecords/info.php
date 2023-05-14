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
            <div class="report">
                <h2 class="content_h1">Expectant Mother profile - <?php echo $data['mother']->mname; ?></h2>
                <!-- <a href="<!?php echo URLROOT; ?>/childrens/add/<!?php echo $data['mother']->nic; ?>"><button class="add">Add Child</button></a>  -->
                <?php
                if ($data['existing']) {
                    echo '<a href="' . URLROOT . '/doctorRecords/previousPregInfo/' . $data['mother']->nic . '"><button class="button2">See Previous pregnancy details</button></a>';
                } else {
                    // do something else here
                }
            ?>
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
                                <td><?php echo $data['mother']->mname; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><?php echo $data['mother']->mage; ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Gravidity</td>
                                <td><!?php echo $data['mother']->gravidity; ?> </td>
                            </tr> -->
                            <tr>
                                <td>Level of Education</td>
                                <td><?php echo $data['mother']->mlevelofeducation; ?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td><?php echo $data['mother']->moccupation; ?></td>
                            </tr>
                            <tr>
                                    <th colspan=3>Children</th>
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
                    
                    

                    <!-- <div class="card1">
                        <div class="container">
                            <button>vaccination</button>
                            <table>
                                <tr>
                                    <th colspan=3>Children</th>
                                </tr>
                                <!?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><!?php echo $children->child_id; ?></td>
                                        <td><!?php echo $children->name; ?></td>
                                        <td><a href="<!?php echo URLROOT; ?>/childrens/childprofile/<!?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
                                    </tr>
                                <!?php endforeach; ?>
                            </table> 
                        </div>
                    </div> -->
                
                

                <div>
                    <div class="card1">
                        <div class="container">
                            
                        <h3 class="content_h2">Vaccination</h3>
                               
                                <!-- <button>vaccination</button> -->
                                <a href="<?php echo URLROOT; ?>/doctorRecords/mother_vaccination/<?php echo $data['mother']->nic; ?>"><button>Vaccination</button></a>
            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Weight Age Chart</h3>
                            <a href="<?php echo URLROOT; ?>/doctorRecords/mother_charts/<?php echo $data['mother']->nic; ?>"><button>See Chart</button></a>
                            <!-- <a href="<!?php echo URLROOT; ?>/childrens/children_charts/<!?php echo $data['child']->child_id; ?>"><button class="add">Weight Age Chart</button></a> -->
                            </div>
                            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Gravidity Weeks</h3>
                            <p> <?php echo $data['poa']['weeks'] . ' weeks ' . $data['poa']['days'] . ' days '; ?></p>
                            <!-- <a href="<!?php echo URLROOT; ?>/childrens/children_charts/<!?php echo $data['child']->child_id; ?>"><button class="add">Weight Age Chart</button></a> -->
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>    

            <div>
                <div class="report">
                    <h2 class="content_h2">Monthly Reports</h2>
                    <!-- <a href="<!?php echo URLROOT; ?>/doctorRecords/motherreport/<!?php echo $data['mother']->nic; ?>"><button class="add">Add report</button></a> -->
                </div>
                <div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Blood Pressure</th>
                            <th>Weight</th>
                            <th>BP status</th> 
                            <th>BMI</th>
                            <th>BMI status</th>
                            <th>Risky status</th>
                            <th></th>
                        </tr>

                        <?php if(!empty($data['midwiferecords'])) :
                            foreach($data['midwiferecords'] as $midwiferecords) :
                                $bplimit = $this->doctorRecordModel->calculateBloodPressure($midwiferecords->bp);
                                $bmilimit = $this->doctorRecordModel->calculateBMILimit($midwiferecords->bmi);
                                $risky = $this->doctorRecordModel->calculateRisky($bplimit, $bmilimit);
                        ?>
                                    <tr>
                                        <td><?php echo $midwiferecords->date; ?></td>
                                        <td><?php echo $midwiferecords->bp; ?></td>
                                        <td><?php echo $midwiferecords->weight; ?></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $bplimit; ?></b></i></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $midwiferecords->bmi; ?></b></i></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $bmilimit; ?></b></i></td>

                                        <?php if($risky == 'High Risk'): ?>
                                            <td style="color: red;"><i><b><?php echo $risky; ?></b></i></td>
                                        <?php elseif($risky == 'Moderate Risk'): ?>
                                            <td style="color: orange;"><i><b><?php echo $risky; ?></b></i></td>
                                        <?php elseif($risky == 'Low Risk'): ?>
                                            <td style="color: yellow;"><i><b><?php echo $risky; ?></b></i></td>
                                        <?php else: ?>
                                            <td style="color: green;"><i><b><?php echo $risky; ?></b></i></td>
                                        <?php endif; ?>

                                        <!-- <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<!?php echo $data['info']->nic; ?>/<!?php echo $report->date; ?>"><button>See More</button></a></td> -->
                                        <td>
                                            <?php

                                                $found = false;
                                                if ($data['doctorrecords']) {
                                                    foreach ($data['doctorrecords'] as $doctorrecords) {
                                                        if ($midwiferecords->date == $doctorrecords->date) {
                                                            echo '<a href="' . URLROOT . '/doctorRecords/mother_reports/' . $data['mother']->nic . '/' . $midwiferecords->date . '"><button class="more1999">View Reports</button></a>';
                                                            // echo 'view report';
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                    if (!$found) {
                                                        //echo 'add report';
                                                        echo '<a href="' . URLROOT . '/doctorRecords/motherreport/' . $data['mother']->nic . '"><button class="more1999">Add Report</button></a>';
                                                    }
                                                } else {
                                                    // echo 'add report';
                                                    echo '<a href="' . URLROOT . '/doctorRecords/motherreport/' . $data['mother']->nic . '"><button class="more1999">Add Report</button></a>';
                                                }

                                            ?>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td>No Reports added yet</td></tr>
                                <?php endif; ?>














                        <!-- <!?php foreach($data['midwiferecords'] as $midwiferecords) : ?>
                            <tr>
                                <td><!?php echo $midwiferecords->date; ?></td>
                                <td><!?php echo $midwiferecords->bp; ?></td>
                                <td><!?php echo $midwiferecords->weight; ?></td>
                                 <td><!?php echo $midwiferecords->bmi; ?></td> 
                                
                                <td>
                                <!?php

                                    $found = false;
                                    if ($data['doctorrecords']) {
                                        foreach ($data['doctorrecords'] as $doctorrecords) {
                                            if ($midwiferecords->date == $doctorrecords->date) {
                                                echo '<a href="' . URLROOT . '/doctorRecords/mother_reports/' . $data['mother']->nic . '/' . $midwiferecords->date . '"><button class="more1999">View Reports</button></a>';
                                                // echo 'view report';
                                                $found = true;
                                                break;
                                            }
                                        }
                                        if (!$found) {
                                            //echo 'add report';
                                            echo '<a href="' . URLROOT . '/doctorRecords/motherreport/' . $data['mother']->nic . '"><button class="more1999">Add Report</button></a>';
                                        }
                                    } else {
                                        // echo 'add report';
                                        echo '<a href="' . URLROOT . '/doctorRecords/motherreport/' . $data['mother']->nic . '"><button class="more1999">Add Report</button></a>';
                                    }

                                ?>
                                    <!?php 
                                        if(empty($data['check_doctorreport'])){
                                            echo '<a href="' . URLROOT . '/doctorRecords/childreport/' . $data['child']->child_id . '"><button class="more1999">Add Report</button></a>';
                                        } else {
                                            echo '<a href="' . URLROOT . '/doctorRecords/child_reports/' . $data['child']->child_id . '/' . $midwiferecords->date . '"><button class="more1999">View Reports</button></a>';
                                        }
                                    ?> 
                                </td>
                            </tr>
                        <!?php endforeach; ?> -->
                        
                    </table>
                </div>
                <br>
                <br>

            </div>
            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


