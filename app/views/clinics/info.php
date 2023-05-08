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
            <a href="<?php echo URLROOT; ?>/clinics" class="back"><i class="fa fa-backward"></i>  Back</a>
            <div>
                <div>
                    <h2 class="content_h1"><?php echo $data['clinic']->clinic_name; ?></h2>
                    <hr class="line">
                </div>
                <div class="info-tab">
                    <div>
                        <table>
                            <tr>
                                <th>Clinic Details </th>
                                <th><button id="myBtn4" class="add2">Edit clinic</button></th>
                            </tr>
                            <tr>
                                <td>Clinic id</td>
                                <td><?php echo $data['clinic']->id; ?></td>
                            </tr>
                            <tr>
                                <td>Clinic Name</td>
                                <td><?php echo $data['clinic']->clinic_name; ?></td>
                            </tr>
                            <tr>
                                <td>Grama Niladhari Division</td>
                                <td><?php echo $data['clinic']->gnd; ?></td>
                            </tr>
                            <tr>
                                <td>Location Address</td>
                                <td><?php echo $data['clinic']->location; ?></td>
                            </tr>
                            <tr>
                                <td>Clinic dates</td>
                                <td>
                                    
                                        Child Clinic : <?php echo $data['clinic']->child_clinic_date; ?> <br/>
                                    
                                        Maternity Clinic : <?php echo $data['clinic']->maternity_clinic_date; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="info-cards-d">
                        <div class="info-card-d">
                            <div class="card-d-content">
                                <br>
                                <div class="icon-box">
                                    <i class="fa fa-users"></i>
                                </div>
                                <br>
                                <div class="number"><?php echo $data['clinicattendees']; ?></div>
                                <br>
                                <div class="card-d-name">Clinic Attendees</div>
                            </div>
                            
                        </div>

                        <div class="info-card-d">
                            <div class="info-card-d-content">
                                <br>
                                <div class="icon-box">
                                    <i class="fa fa-child"></i>
                                </div>
                                <br>
                                <div class="number"><?php echo $data['children']; ?></div>
                                <br>
                                <div class="card-d-name">Children</div>
                            </div>
                            
                        </div>

                    </div>
                    
                    
                    
                </div>
                
            </div>

        
            
            <div class="row">
                <div class="column">
                    <h1 class="content_h1">Previous Staff</h1>
                    <table class="t1">
                        <tr>
                            <th><h2>Doctors</h2></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Doctor Id</th>
                            <th>Name</th>
                        </tr>
                        <?php if (!empty($data['previousdoctors'])) : ?>
                            <?php foreach($data['previousdoctors'] as $previousdoctors) : ?>
                                <tr>
                                    <td><?php echo $previousdoctors->nic ?></td>
                                    <td><?php echo $previousdoctors->name; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td>No Doctors were assigned so far</td></tr>
                        <?php endif; ?>
                    </table>
                            <br>

                    <table class="t1">
                        <tr>
                            <th><h2>Midwives</h2></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Midwife Id</th>
                            <th>Name</th>
                            <th>PHM Worked</th>
                        </tr>
                        <?php if (!empty($data['previousmidwifes'])) : ?>
                            <?php foreach($data['previousmidwifes'] as $previousmidwifes) : ?>
                                <tr>
                                    <td><?php echo $previousmidwifes->nic ?></td>
                                    <td><?php echo $previousmidwifes->name; ?></td>
                                    <td><?php echo $previousmidwifes->phm; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td>No Midwives were assigned so far</td></tr>
                        <?php endif; ?>
                    </table>
                </div>


                <div class="column">
                    <h1 class="content_h1">Current Staff</h1>
                    <table class="t1">
                        <tr>
                            <th><h2>Doctors</h2></th>
                            <th></th>
                            <th><button id="myBtn" class="add2">Add Doctor</button></th>
                        </tr>
                        <tr>
                            <th>Doctor Id</th>
                            <th>Name</th>
                            <th>E-mail</th>
                        </tr>
                        <?php if (!empty($data['showdoctors'])) : ?>
                            <?php foreach($data['showdoctors'] as $showdoctors) : ?>
                                <tr>
                                    <td><?php echo $showdoctors->nic ?></td>
                                    <td><?php echo $showdoctors->name; ?></td>
                                    <td><?php echo $showdoctors->email; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td>Not assigned any doctor</td></tr>
                        <?php endif; ?>
                    </table>

                    <br>
                    <br>
                    <div class="report">
                        <h2 class="content_h1">PHM Area - Midwives</h2>
                        <button id="myBtn2" class="add2">Add phm</button>
                    </div>

                    <?php foreach($data['phm'] as $phm) : ?>
                        <table>
                            <tr>
                                <td><?php echo $phm->phm; ?></td>
                                <td></td>
                                <td><a href="<?php echo URLROOT; ?>/clinics/phm/<?php echo $phm->id; ?>"><button class="add2">Add Midwife</button></a></td>    
                            </tr>
                            <tr>
                                <th>Midwife Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                            </tr>
                            <?php 
                                $midwives = $data['midwife'];
                                $phm_midwives = array_filter($midwives, function($midwife) use ($phm) {
                                    return $midwife->phm == $phm->id;
                                });
                                if(!empty($phm_midwives)){
                                    foreach($phm_midwives as $midwife){
                            ?>
                                        <tr>
                                            <td><?php echo $midwife->nic; ?></td>
                                            <td><?php echo $midwife->name; ?></td>
                                            <td><?php echo $midwife->email; ?></td>
                                        </tr>
                            <?php 
                                    }
                                } else {
                                    echo '<tr><td colspan="3">Not assigned any midwife</td></tr>';
                                }
                            ?>   
                        </table>
                        <br>    
                    <?php endforeach; ?>
                </div>


                <!-- <div class="column">
                    <h1 class="content_h1">PHM Area</h1>
                    <br>
                    <!?php foreach($data['phm'] as $phm) : ?>
                        <table>
                            <tr>
                                <td><!?php echo $phm->phm; ?></td>
                                <td></td>
                                <td><a href="<!?php echo URLROOT; ?>/clinics/phm/<!?php echo $phm->id; ?>"><button class="add2">Add Midwife</button></a></td>    
                            </tr>
                            <tr>
                                <th>Midwife Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                            </tr>
                            <!?php 
                                if(($data['midwife']->phm) == ($phm->id)){
                                    foreach($data['midwife'] as $midwife) {
                                ?>
                                        <tr>
                                            <th><!?php echo $midwife->nic; ?></th>
                                            <th><!?php echo $midwife->name; ?></th>
                                            <th><!?php echo $midwife->email; ?></th>
                                        </tr>
                                <!?php 
                                    }
                                } else {
                                    echo 'Not assigned any midwife';
                                }
                            ?>   
                        </table>
                        <br>    
                    <!?php endforeach; ?>
                </div> -->
            </div>

            <!--The model for popup-->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span class="close">&times;</span>
                    <form action="<?php echo URLROOT; ?>/clinics/info/<?php echo $data['clinic']->id; ?>" method="post">
                        <h2>Add doctors to the clinic</h2>
                        <p>Select doctors to add to the clinic </p>
                        <div>
                            <label for="doctor">Doctors: <sup>*</sup></label> <br>
                            <select name="doctor" id="doctor">
                                <option value="">Select a doctor</option>
                                <?php foreach($data['doctors'] as $doctors) : ?>
                                    <option value="<?php echo $doctors->nic; ?>"><?php echo $doctors->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form-err"><?php echo $data['doctor_err']; ?></span>
                        </div> 
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>

            <!--The model for popup-->
            <div id="myModal2" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                <span class="close2">&times;</span>
                    <form action="<?php echo URLROOT; ?>/clinics/info/<?php echo $data['clinic']->id; ?>" method="post">
                        <h2>Add PHM Area to a clinic</h2>
                        <p>Set the code to create a PHM Area</p>
                        <div>
                            <label for="newphm">PHM area name: <sup>*</sup></label> <br>
                            <input type="text" id="newphm" name="newphm" placeholder="<?php echo $data['clinic']->clinic_name; ?>">
                            <span class="form-err"><?php echo $data['newphm_err']; ?></span>
                        </div> 
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>


            <!--The model for popup-->
            <div id="myModal4" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                <span class="close4">&times;</span>
                    <form action="<?php echo URLROOT; ?>/clinics/info/<?php echo $data['clinic']->id; ?>" method="post">
                        <h2>Edit Clinic Details</h2>
                        <p>Edit following feilds to Change Clinic Details</p><br>
                        <div>
                            <label for="edit-name">Clinic Name: </label> <br>
                            <input type="text" id="edit-name" name="edit-name" value="<?php echo $data['clinic']->clinic_name; ?>">
                            <span class="form-err"><?php echo $data['edit-name_err']; ?></span>
                        </div> 
                        <div>
                            <label for="edit-location">Clinic Name: </label> <br>
                            <input type="text" id="edit-location" name="edit-location" value="<?php echo $data['clinic']->location; ?>">
                            <span class="form-err"><?php echo $data['edit-location_err']; ?></span>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>


            


            <script src="<?php echo URLROOT ; ?>/js/admin.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>



