<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
    <div class="content">
        <a href="<?php echo URLROOT; ?>/expectantRecords/expectnatmotherlist" class="back"><i class="fa fa-backward"></i>Back</a>
            <br>
            <div class="report">
                <h2 class="content_h1">Expectant Mother profile - <?php echo $data['info']->mname; ?></h2>
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
                            <tr>
                                <td>Gravidity</td>
                                <td><?php echo $data['info']->gravidity; ?> </td>
                            </tr>
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
                                    <th>Children </th>
                                    <th colspan=2><a href="<?php echo URLROOT; ?>/childrens_expectant/add/<?php echo $data['info']->nic; ?>"><button class="button1">Add Child</button></a></th>
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
                    <div class="card1">
                        <div class="container">
                            
                        <h3 class="content_h2">Vaccination</h3>
                               
                        <a href="<?php echo URLROOT; ?>/expectantRecords/mother_vaccination/<?php echo $data['info']->nic; ?>"><button class="button2">Vaccination</button></a>
                                <!-- <!?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><!?php echo $children->child_id; ?></td>
                                        <td><!?php echo $children->name; ?></td>
                                        <td><a href="<!?php echo URLROOT; ?>/childrens/childprofile/<!?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
                                    </tr>
                                <!?php endforeach; ?> -->
            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Weight Age Chart</h3>
                            <!-- <button>See Chart</button> -->
                            <a href="<?php echo URLROOT; ?>/expectantRecords/mother_charts/<?php echo $data['info']->nic; ?>"><button class="button2">See Chart</button></a>
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
                    <a href="<?php echo URLROOT; ?>/expectantRecords/add/<?php echo $data['info']->nic; ?>"><button class="button2">Add Report</button></a>
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
                        
                        <!-- <!?php foreach($data['report'] as $report) : ?>
                            <tr>
                                <td><!?php echo $report->date; ?></td>
                                <td><!?php echo $report->bp; ?></td>
                                <td><!?php echo $report->weight; ?></td>
                                <td style="color: #cc00ff;"><i><b><!?php echo $data['bplimit']; ?></b></i></td>
                                <td style="color: #cc00ff;"><i><b><!?php echo $report->bmi; ?></b></i></td>
                                <td style="color: #cc00ff;"><i><b><!?php echo $data['bmilimit']; ?></b></i></td>

                                <!?php
                                    if($data['risky'] == 'High Risk'){
                                        echo '<td style="color: red;"><i><b>' . $data['risky'] . '</b></i></td>';
                                    } elseif($data['risky'] == 'Moderate Risk'){
                                        echo '<td style="color: orange;"><i><b>' . $data['risky'] . '</b></i></td>';
                                    } elseif($data['risky'] == 'Low Risk'){
                                        echo '<td style="color: yellow;"><i><b>' . $data['risky'] . '</b></i></td>';
                                    } else {
                                        echo '<td style="color: green;"><i><b>' . $data['risky'] . '</b></i></td>';
                                    }
                                ?>

                                <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<!?php echo $data['info']->nic; ?>/<!?php echo $report->date; ?>"><button>See More</button></a></td>
                                <td></td>
                            </tr>
                        <!?php endforeach; ?> -->


                        <!-- <!?php if(!empty($data['report'])) :
                            foreach($data['report'] as $report) : ?>
                                <tr>
                                    <td><!?php echo $report->date; ?></td>
                                    <td><!?php echo $report->bp; ?></td>
                                    <td><!?php echo $report->weight; ?></td>
                                    <td style="color: #cc00ff;"><i><b><!?php echo $data['bplimit']; ?></b></i></td>
                                    <td style="color: #cc00ff;"><i><b><!?php echo $report->bmi; ?></b></i></td>
                                    <td style="color: #cc00ff;"><i><b><!?php echo $data['bmilimit']; ?></b></i></td>

                                    <!?php
                                        if($data['risky'] == 'High Risk'){
                                            echo '<td style="color: red;"><i><b>' . $data['risky'] . '</b></i></td>';
                                        } elseif($data['risky'] == 'Moderate Risk'){
                                            echo '<td style="color: orange;"><i><b>' . $data['risky'] . '</b></i></td>';
                                        } elseif($data['risky'] == 'Low Risk'){
                                            echo '<td style="color: yellow;"><i><b>' . $data['risky'] . '</b></i></td>';
                                        } else {
                                            echo '<td style="color: green;"><i><b>' . $data['risky'] . '</b></i></td>';
                                        }
                                        ?>

                                        <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<!?php echo $data['info']->nic; ?>/<!?php echo $report->date; ?>"><button>See More</button></a></td>
                                        <td></td>
                                    </tr>
                                <!?php endforeach; ?>
                            <!?php else: ?>
                                <tr><td>No Reports added yet</td></tr>
                            <!?php endif; ?> -->


                            <?php if(!empty($data['report'])) :
                                foreach($data['report'] as $report) :
                                    $bplimit = $this->expectantRecordModel->calculateBloodPressure($report->bp);
                                    $bmilimit = $this->expectantRecordModel->calculateBMILimit($report->bmi);
                                    $risky = $this->expectantRecordModel->calculateRisky($bplimit, $bmilimit);
                            ?>
                                    <tr>
                                        <td><?php echo $report->date; ?></td>
                                        <td><?php echo $report->bp; ?></td>
                                        <td><?php echo $report->weight; ?></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $bplimit; ?></b></i></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $report->bmi; ?></b></i></td>
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

                                        <td><a href="<?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<?php echo $data['info']->nic; ?>/<?php echo $report->date; ?>"><button class="button2">See More</button></a></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td>No Reports added yet</td></tr>
                            <?php endif; ?>



                        
                    </table>
                </div>
                <br>
                <br>

            </div>
 
        <!-- <div class="content_expectant2">
            

        
    


                
                
        <div class="dailyrecords">
        
        <div class= "newregdetails">
        <div>
            
            <h2 class="content_h3">Monthly Records</h2>
            <hr class="line">
        </div>
            <table>
                
                <tr>
                    <th>Report No</th>
                    <th>Date</th>
                    <th>Weight</th>
                    <th>Triposha</th>
                    <th>BMI</th>
                    
                </tr>
                <!?php foreach($data['report'] as $report):?> <!?php foreach ($data['expectantRecordsHeight'] as $expectantRecordsHeight):?>
                    <tr>
                    <th><!?php echo $report->reportNo; ?></a> </th>
                        <td><!?php echo $report->date; ?></td>
                        <td><!?php echo $report->weight; ?></td> 
                        <td><!?php echo $report->triposha; ?></td>
                        <<td><--?php echo ($report->weight)/($expectantRecordsHeight->height); ?></td>-->
                        <!-- <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant/<!?php echo $data['info']->nic; ?>/<!?php echo $report->reportNo; ?>" class= "updateDeliveredbutton" > More Info</a></td>
               
                        
     
                                    
                    </tr>
                <!?php endforeach; ?>
                <!?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
                
</div>
 </div> -->
                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--th><a href="expectant/<!?php echo $report->reportNo; ?>"><!?php echo $report->reportNo; ?></a> </th>
<td><input type="text" name="nic" maxlength="20" value="<!?php echo $data['info']->nic; ?>">