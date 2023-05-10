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

        <h1 class="content_h1">Welcome, <?php if(isset($_SESSION['clinicattendee_nic'])){
            echo explode(" ", $_SESSION['clinicattendee_name'])[0];
            } else {
                echo 'Guest';
            }
        ?>
        </h1>

    <?php 
        if (empty($data['mother_or_parent'])) {
    ?>

        <div class="mine">
                    <div class="card">
                        <div class="container">
                            <table>
                            <tr>
                                <th colspan=3>Next Clinic Date</th>
                            </tr>
                            <tr>
                                <td colspan=2>  <a href="<?php echo URLROOT; ?>/calendars/clinicattendeecalendar"><button>Check Calender</button></td>
                            </tr>
                            <tr>
                                    <th colspan=3>Children </th>
                                </tr>
                                <?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><?php echo $children->child_id; ?></td>
                                        <td><?php echo $children->name; ?></td>
                                        <td><a href="<?php echo URLROOT; ?>/clinicattendees/child/<?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
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
                        <!-- <button>See More</button> -->
                               
                        <a href="<?php echo URLROOT; ?>/clinicattendees/mother_vaccination"><button>Vaccination</button></a>
                                
            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Weight Age Chart</h3>
                            <!-- <button>See Chart</button> -->
                            <a href="<?php echo URLROOT; ?>/clinicattendees/mother_charts"><button>See Chart</button></a>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Gravidity Weeks</h3>
                            <p> <?php echo $data['poa']['weeks'] . ' weeks ' . $data['poa']['days'] . ' days '; ?></p>
                            </div>
                            
                        </div>
                    </div>
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

                                        <td><a href="<?php echo URLROOT; ?>/clinicattendees/expectant_allrecords/<?php echo $report->date; ?>"><button>See More</button></a></td>
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

    <?php 
        } else {
            ?>
            
            <div class="mine">
                <div class="card">
                    <div class="container">
                        <table>
                            <tr>
                                <th colspan=3>Next Clinic Date</th>
                            </tr>
                            <tr>
                                <td colspan=2><a href="<?php echo URLROOT; ?>/calendars/clinicattendeecalendar"><button>Check Calender</button></td>
                            </tr>
                            
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="container">
                        <table>
                        <tr>
                            <th colspan=3>Children </th>
                        </tr>
                        <?php foreach($data['children'] as $children) : ?>
                            <tr>
                                <td><?php echo $children->child_id; ?></td>
                                <td><?php echo $children->name; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/clinicattendees/child/<?php echo $children->child_id; ?>"><button class="more1999">More</button></a></td>
                            </tr>
                        <?php endforeach; ?>
                        
                        </table> 
                    </div>
                </div>
            
            </div>

            <br>
            <br>
            
            
            <?php
        }
    ?>

        <!-- <div class="bg_index">

            <h2>Overview</h2> 

            <div class="row_CA">
                <div class="dashboard_CA">
                    <h4>Next Clinic Date</h4> <br>
                    <div class="">
                       <p>
                        Monthly Clinic
                        <br><br>
                        Date: 2022/05/03
                       </p> 

                        <br>
                        <div>
                            <a href="<!?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button class="reserve_btn">Reserve</button></a>
                        </div>
                    </div>

                    

                    <div class="">
                        <p>
                        Next vaccination

                        <br><br>
                        Date: 2022/05/03
                        </p>
                 
                        <div>
                            <a href="<!?php echo URLROOT; ?>/clinicattendees/timeslot_monthlyclinic"><button class="reserve_btn">Reserve</button></a>
                        </div>
                    </div>

                    <div class="">
                        <br>
                        Vaccination

                        <a href="<!?php echo URLROOT; ?>/clinicattendees/vaccination"><button
                                class="go_1_btn"><b>Go</b></button></a>

                    </div>

                </div>


                <div class="dashboard_CA">
                    <h4>Children</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>Register number</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!?php foreach($data['children'] as $children) : ?>
                            <tr>
                                <td><!?php echo $children->child_id; ?></td>
                                <td><!?php echo $children->name; ?></td>

                                <td colspan=2> <a href="<!?php echo URLROOT; ?>/clinicattendees/child/<!?php echo $children->child_id; ?>"><button class="go_btn">Go</button></a>
                                </td>
                            </tr>
                            <!?php endforeach; ?>
                        </tbody>

                    </table>

                    <br>
                    <br>
                </div>
            </div>

            <div class="T1">

                 <div class="welcomebox"> 

                
                <br> <br>

                <h3>Monthly Reports <hr> </h3>
                <br><br>

                <div class="card_1">
                <table class="index_table">
                    <thead>
                        <tr>
                            <th>Report number</th>
                            <th>Date</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!?php foreach($data['report'] as $repot) : ?>
                        <tr>
                            <td><!?php echo $repot->reportNo; ?></td>
                            <td><!?php echo $repot->date; ?></td>
                            <td><!?php echo $repot->weight; ?></td>

                            <td colspan=2><a href="<!?php echo URLROOT; ?>/clinicattendees/detailreport"><button class="more_btn"><b>More</b></button></a></td>

                        </tr>
                        <!?php endforeach; ?>
                    </tbody>
                </table>
                </div>





            </div>

        </div> -->

        

    
        <?php require APPROOT . '/views/inc/footer.php'; ?>