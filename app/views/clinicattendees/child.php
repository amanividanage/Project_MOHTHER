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

    <a class="back_btn" href="<?php echo URLROOT; ?>/clinicattendees/children"><i class="fa fa-chevron-left"></i></a>

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

                            <a href="<?php echo URLROOT; ?>/clinicattendees/child_vaccination/<?php echo $data['child']->child_id; ?>"><button>See Given Vaccines</button></a>
                            
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
                            <a href="<?php echo URLROOT; ?>/clinicattendees/child_charts/<?php echo $data['child']->child_id; ?>"><button>Take a look</button></a>
                            </div>    
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Age of the Child</h3>
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
                        <?php foreach($data['midwiferecords'] as $midwiferecords) : ?>
                            <tr>
                                <td><?php echo $midwiferecords->date; ?></td>
                                <td><?php echo $midwiferecords->skin; ?></td>
                                <td><?php echo $midwiferecords->eye; ?></td>
                                <td><?php echo $midwiferecords->temp; ?></td>
                                <td><?php echo $midwiferecords->umbilicus; ?></td>
                                <td><?php echo $midwiferecords->other; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/clinicattendees/child_reports/<?php echo $data['child']->child_id; ?>/<?php echo $midwiferecords->date; ?>"><button>Take a look</button></a></td>
                                
                                <!-- <td>
                                <!?php

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
                                    
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                             
                        </div>
                    </div>

                    
                </div>

                
                <br>
                <br>

            </div>



























        <!-- <br> <br>

        <h2 class="content_h1"><!?php echo $data['child']->name ;?> </h2>

        <div class="row_CA">
            <div class="dashboard_CA">
                <table class="child_pro_table">

                    <tr>
                        <th>
                            <h3>Baby's details</h3>

                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><!?php echo $data['child']->name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of birth</td>
                        <td><!?php echo $data['child']->dob; ?></td>
                    </tr>
                    <tr>
                        <td>Registration date</td>
                        <td><!?php echo $data['child']->date; ?></td>
                    </tr>
                    <tr>
                        <td>Hospital</td>
                        <td><!?php echo $data['child']->hospital; ?></td>
                    </tr>

                    <tr>
                        <td>Birth weight</td>
                        <td><!?php echo $data['child']->weight; ?></td>
                    </tr>

                    <tr>
                        <td>Circumference</td>
                        <td><!?php echo $data['child']->circumference; ?></td>
                    </tr>

                    <tr>
                        <td>Length</td>
                        <td><!?php echo $data['child']->length; ?></td>
                    </tr>

                    <tr>
                        <td>Special comments</td>
                        <td><!?php echo $data['child']->special; ?></td>
                    </tr>

                </table>

            </div>



            <div class="dashboard_CA">


                <div>
                    Charts
                    <a href="<!?php echo URLROOT; ?>/clinicattendees/child_chart"><button
                            class="go_1_btn"><b>GO</b></button></a>

                    <br><br> <br> <br> <br>

                    Vaccination
                    <a href="<!?php echo URLROOT; ?>/clinicattendees/child_vaccination"><button
                            class="go_1_btn"><b>Go</b></button></a>
                </div>
                <br>
                <h4>Next Clinic Date</h4>
                <div>
                    <br>
                    <p>
                        Monthly Clinic

                        <br><br>
                        Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<!?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>



                <div>
                    <p>
                        Next vaccination

                        <br><br>
                        Date: 2022/05/03
                    </p>
                    <br>
                    <div>
                        <a href="<!?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button
                                class="reserve_btn">Reserve</button></a>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="T1">
            <br> <br>

            <h3>Monthly Reports
                <hr>
            </h3>
            <br><br>

            <div class="card_1">
                <table class="index_table">
                    <thead>
                        <tr>
                            <th>Record No</th>
                            <th>Date</th>
                            <th>Skin color</th>
                        </tr>
                    </thead>
                    <!?php foreach($data['records'] as $records) : ?>
                    <tbody>
                        <tr>
                            <td><!?php echo $records->reportno; ?></td>
                            <td><!?php echo $records->date; ?></td>
                            <td><!?php echo $records->skin; ?></td>
                            <td colspan=2><a
                                    href="<!?php echo URLROOT; ?>/clinicattendees/childreport/<!?php echo $data['id'] ;?>/<!?php echo $records->reportno; ?>"><button
                                        class="more_btn"><b>More</b></button></a></td>
                        </tr>
                    </tbody>
                    <!?php endforeach; ?>
                </table>
            </div>
        </div>

        
<br>
<br>
<br>
    </div> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>





        



        





        




        




        