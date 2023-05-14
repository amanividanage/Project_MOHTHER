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
                <h2 class="content_h1">Child profile - <?php echo $data['child']->name; ?></h2>
                <!-- <a href="<!?php echo URLROOT; ?>/childrens/add/<!?php echo $data['mother']->nic; ?>"><button class="add">Add Child</button></a>  -->
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

                            <a href="<?php echo URLROOT; ?>/doctorRecords/child_vaccination/<?php echo $data['child']->child_id; ?>"><button>See Given Vaccines</button></a>
                            
                            <!-- <!?php echo $data['months']. ' months '; ?>

                            <!?php foreach($data['checkvaccine'] as $checkvaccine) : ?>
                            
                                <p><!?php echo $checkvaccine->vaccine; ?></p>
                                
                            <!?php endforeach; ?> -->

                            
                            
                            <!-- <a href="<!?php echo URLROOT; ?>/childrens/vaccination/<!?php echo $data['child']->child_id; ?>"><button class="add">Vaccination</button></a> -->
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Weight Age Chart</h3>
                            <a href="<?php echo URLROOT; ?>/doctorRecords/child_charts/<?php echo $data['child']->child_id; ?>"><button>Take a look</button></a>
                            </div>    
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Age of the Child</h3>
                            <!-- <button class="add">Age</button>  -->
                            <!-- <h1><!?php echo $data['name']; ?></h1> -->
                            <p> <?php echo $data['age']['years'] . ' years, ' . $data['age']['months'] . ' months, ' . $data['age']['days'] . ' days'; ?></p>
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
                </div>

                <div>
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Skin color</th>
                            <th>Eye Sight</th>
                            <th>Temperature</th>
                            <th>Nature of the umbilicus</th>
                            <th>Other Complications</th>
                            <th></th>
                        </tr>
                    <?php if(!empty($data['midwiferecords'])) : ?>
                        <?php foreach($data['midwiferecords'] as $midwiferecords) : ?>
                            <tr>
                                <td><?php echo $midwiferecords->date; ?></td>
                                <td><?php echo $midwiferecords->skin; ?></td>
                                <td><?php echo $midwiferecords->eye; ?></td>
                                <td><?php echo $midwiferecords->temp; ?></td>
                                <td><?php echo $midwiferecords->umbilicus; ?></td>
                                <td><?php echo $midwiferecords->other; ?></td>
                                <td>
                                <?php

                                    $found = false;
                                    if ($data['doctorrecords']) {
                                        foreach ($data['doctorrecords'] as $doctorrecords) {
                                            if ($midwiferecords->date == $doctorrecords->date) {
                                                echo '<a href="' . URLROOT . '/doctorRecords/child_reports/' . $data['child']->child_id . '/' . $midwiferecords->date . '"><button class="more1999">View Reports</button></a>';
                                                $found = true;
                                                break;
                                            }
                                        }
                                        if (!$found) {
                                            echo '<a href="' . URLROOT . '/doctorRecords/childreport/' . $data['child']->child_id . '"><button class="more1999">Add Report</button></a>';
                                        }
                                    } else {
                                        echo '<a href="' . URLROOT . '/doctorRecords/childreport/' . $data['child']->child_id . '"><button class="more1999">Add Report</button></a>';
                                    }

                                ?>
                                    <!-- <!?php 
                                        if(empty($data['check_doctorreport'])){
                                            echo '<a href="' . URLROOT . '/doctorRecords/childreport/' . $data['child']->child_id . '"><button class="more1999">Add Report</button></a>';
                                        } else {
                                            echo '<a href="' . URLROOT . '/doctorRecords/child_reports/' . $data['child']->child_id . '/' . $midwiferecords->date . '"><button class="more1999">View Reports</button></a>';
                                        }
                                    ?> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                            <tr><td>No Reports added yet</td></tr>
                        <?php endif; ?>
                    </table>
                    <br><br><br><br>
                </div>
                             
                        </div>
                    </div>

                    <!-- <div class="card">
                        <div class="container">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan=2>Doctor Records</th>
                                        <th colspan=2><a href="<!?php echo URLROOT; ?>/doctorRecords/childreport/<!?php echo $data['child']->child_id; ?>"><button class="add">Add report</button></a></th>
                                        <th>HI</th>
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                </thead>
                                <!?php foreach($data['doctorrecords'] as $doctorrecords) : ?>
                                    <tr>
                                        <td><!?php echo $doctorrecords->date; ?></td>
                                        <td><!?php echo $doctorrecords->eye1; ?></td>
                                        <td><!?php echo $doctorrecords->eye; ?></td>
                                        <td><!?php echo $doctorrecords->temp; ?></td>
                                        <td><!?php echo $doctorrecords->umbilicus; ?></td>
                                        <td><!?php echo $doctorrecords->other; ?></td>
                                        <td></td>
                                    </tr>
                                <!?php endforeach; ?>
                            </table> 
                        </div>
                    </div> -->
                </div>

                
                <br>
                <br>

            </div>
            
    
   
    






<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--<th><a href="clinics/info/<!?php echo $clinic->id; ?>"><!?php echo $expectantRecords->nic; ?></a> </th>


