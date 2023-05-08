<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">
            <a href="<?php echo URLROOT; ?>/midwifes" class="back"><i class="fa fa-backward"></i>Back</a>
            <div class="align">
                <div>
                    <h2 class="content_h1">Midwife profile - <?php echo $data['midwife']->name; ?></h2>
                </div>
                
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
                            <td><?php echo $data['midwife']->name; ?></td>
                        </tr>
                        <tr>
                            <td>NIC No</td>
                            <td><?php echo $data['midwife']->nic; ?></td>
                        </tr>
                        <tr>
                            <td>Phone No</td>
                            <td><?php echo $data['midwife']->phone; ?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><?php echo $data['midwife']->email; ?></td>
                        </tr>
                        <tr>
                            <td>Registered date</td>
                            <td><?php echo $data['midwife']->regdate; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>PHM Area</td>
                            <td><!?php echo $data['midwife']->regdate; ?></td>
                        </tr> -->
                        </table> 
                    </div>
                </div>

                <div>
                    <div class="card1">
                        <div class="container">
                            <div>
                            <h3 class="content_h2">Current Clinic</h3>

                            <?php if(!empty($data['clinic'])){
                                    echo $data['clinic']->clinic;
                                    echo "</br>";
                                    echo $data['clinic']->clinic_name;
                                    echo "</br>";
                                    echo $data['clinic']->phm;
                                    echo '<a href="' . URLROOT . '/midwifes/midwife_transfer/' . $data['midwife']->nic . '"><button id="myBtn" class="add">Transfer</button></a>';
                                    // echo '<button id="myBtn" class="add">Transfer</button>';

                                } else {
                                    echo 'Not Appointed to any clinic';
                                    // echo '<button id="myBtn" class="add">Appoint</button>';
                                }
                            ?>


                        <!-- <button id="myBtn" class="add">Transfer</button> -->

                            
                            </div>    
                        </div>
                    </div>
                </div>
            
            </div>

            <br>
            <br>

            <div>
                <div class="report">
                    <h2 class="content_h2">Working history</h2>
                    <!-- <a href="<!?php echo URLROOT; ?>/childrens/report/<!?php echo $data['child']->child_id; ?>"><button class="add">Add report</button></a> -->
                </div>
                <div>
                    <table>
                        <tr>
                            <th>Clinic name</th>
                            <th>PHM Ares</th>
                            <th>Appointed Date</th>
                            <th>Terminated Date</th>
                            <th>Total Work Period</th>
                        </tr>
                        <?php foreach($data['history'] as $history) : ?>
                            <tr>
                                <td><?php echo $history->clinic_name; ?></td>
                                <td><?php echo $history->phm; ?></td>
                                <td><?php echo $history->appdate; ?></td>
                                <td><?php echo $history->transdate; ?></td>
                                <?php
                                    $appdate = $history->appdate;
                                    $transdate = $history->transdate;
                                    $workperiod = $this->midwifeModel->calculateWorkPeriod($appdate, $transdate);
                                ?>
                                <?php if ($history->transdate == '0000-00-00') : ?>
                                    <td>Currently working</td>
                                <?php else : ?>
                                    <td><?php echo $workperiod; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        
                    </table>
                </div>
                <br>
                <br>

            </div>

            <!-- <a href="<!?php echo URLROOT; ?>/doctors/changeclinic/<!?php echo $data['doctor']->nic; ?>"></a> -->

            <!--The model for popup-->
            <!-- <div id="myModal" class="modal">
                <Modal content -->
                <!-- <div class="container_new_modal">
                    <span class="close">&times;</span>
                    <form action="<!?php echo URLROOT; ?>/midwifes/midwifeprofile/<!?php echo $data['midwife']->nic; ?>" method="post">
                        <h2>Transfer midwife to another clinic</h2>
                        <p>Select a clinic to transfer the midwife </p>
                        <div>
                            <label for="newclinic">Clinics: <sup>*</sup></label> <br>
                            <select name="newclinic" id="newclinic" onchange="myFunction()" value="<!?php echo $data['newclinic']; ?>">
                                <option value="">Select a clinic</option>
                                <!?php foreach($data['clinics'] as $clinics) : ?>
                                    <option value="<!?php echo $clinics->id; ?>"><!?php echo $clinics->clinic_name; ?></option>
                                <!?php endforeach; ?>
                            </select>
                            <span class="form-err"><!?php echo $data['newclinic_err']; ?></span>

                            <select name="newphm" id="newphm" value="<!?php echo $data['newphm']; ?>">
                                <option value="">Select a clinic</option>
                            </select>
                            <span class="form-err"><!?php echo $data['newphm_err']; ?></span>

                        </div> 
                        <input type="submit" value="Submit">
                    </form>
                </div> -->
            <!-- </div>--> 
        
        <script src="<?php echo URLROOT ; ?>/js/admin.js"></script>
        
<?php require APPROOT . '/views/inc/footer.php'; ?>