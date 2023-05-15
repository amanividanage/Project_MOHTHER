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
    
    <a href="<?php echo URLROOT; ?>/doctorRecords/previousPregInfo/<?php echo $data['info']->nic; ?>" class="back"><i class="fa fa-backward"></i>Back</a>
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
                                <th colspan=3>Delivary Infomation</th>
                                <!-- <th></th>
                                <th></th> -->
                            </tr>
                            <tr>
                                <td>Weeks Completed(weeks)</td>
                                <td><?php echo $data['delivaryinfo']->weekscompleted; ?></td>
                            </tr>
                            <tr>
                                <td>Postnatal Complications</td>
                                <td><?php echo $data['delivaryinfo']->postnatalcomplication; ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Gravidity</td>
                                <td><!?php echo $data['info']->gravidity; ?> </td>
                            </tr> -->
                            <tr>
                                <td>Mode of delivary</td>
                                <td><?php echo $data['delivaryinfo']->modeofDelivery; ?></td>
                            </tr>
                            <tr>
                                <td>Diabetes Present after delivery</td>
                                <td><?php echo $data['delivaryinfo']->diabetes; ?></td>
                            </tr>
                            <tr>
                                <td>Any Symptoms</td></td>
                                <td><?php echo $data['delivaryinfo']->symptoms; ?></td>
                            </tr>
                            <tr>
                                    <th colspan=3>Children </th>
                                    <!-- <th colspan=2><a href="<!?php echo URLROOT; ?>/childrens_expectant/add/<!?php echo $data['info']->nic; ?>"><button class="button1">Add Child</button></a></th> -->
                                </tr>
                                <?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><?php echo $children->child_id; ?></td>
                                        <td><?php echo $children->name; ?></td>
                                        <td><a href="<?php echo URLROOT; ?>/doctorRecords/child/<?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </table> 
                            <br>
                                <br>
                                <br>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
   
                <div>
                    <div class="card1">
                        <div class="container">
                            
                        <h3 class="content_h2">Vaccination</h3>
                               
                        <a href="<?php echo URLROOT; ?>/doctorRecords/mother_vaccination/<?php echo $data['info']->nic; ?>"><button class="button2">Vaccination</button></a>
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
                            <a href="<?php echo URLROOT; ?>/doctorRecords/mother_charts_prev/<?php echo $data['info']->nic; ?>/<?php echo $data['grav'] ?>"><button class="button2">See Chart</button></a>
                            <!-- <a href="<!?php echo URLROOT; ?>/childrens/children_charts/<!?php echo $data['child']->child_id; ?>"><button class="add">Weight Age Chart</button></a> -->
                            </div>
                            
                        </div>
                    </div>

                    <!-- <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Gravidity Weeks</h3>
                            <p> <!?php echo $data['poa']['weeks'] . ' weeks ' . $data['poa']['days'] . ' days '; ?></p>
                            <! <a href="<!?php echo URLROOT; ?>/childrens/children_charts/<!?php echo $data['child']->child_id; ?>"><button class="add">Weight Age Chart</button></a> -->
                            <!-- </div>
                            
                        </div>
                    </div> --> 
                </div>

            </div>    

            <div>
                <div class="report">
                    <h2 class="content_h2">Monthly Reports</h2>
                  
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

                            <?php if(!empty($data['previousrecords'])) :
                                foreach($data['previousrecords'] as $previousrecords) :
                                    $bplimit = $this->expectantRecordModel->calculateBloodPressure($previousrecords->bp);
                                    $bmilimit = $this->expectantRecordModel->calculateBMILimit($previousrecords->bmi);
                                    $risky = $this->expectantRecordModel->calculateRisky($bplimit, $bmilimit);
                            ?>
                                    <tr>
                                        <td><?php echo $previousrecords->date; ?></td>
                                        <td><?php echo $previousrecords->bp; ?></td>
                                        <td><?php echo $previousrecords->weight; ?></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $bplimit; ?></b></i></td>
                                        <td style="color: #cc00ff;"><i><b><?php echo $previousrecords->bmi; ?></b></i></td>
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

                                        <!-- <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<!?php echo $data['info']->nic; ?>/<!?php echo $previousrecords->date; ?>"><button class="button2">See More</button></a></td> -->
                                        <!-- <td><a href="<!?php echo URLROOT; ?>/expectantRecords/expectant_allrecords/<!?php echo $data['info']->nic; ?>/<!?php echo $report->date; ?>"><button class="button2">See More</button></a></td> -->
                                        <td><a href="<?php echo URLROOT; ?>/doctorRecords/expectant_allrecords/<?php echo $data['info']->nic; ?>/<?php echo $previousrecords->date; ?>"><button class="button2">See More</button></a></td>
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

                        





<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


