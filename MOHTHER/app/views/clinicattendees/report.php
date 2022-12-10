<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">


        <a href="<?php echo URLROOT; ?>/clinicattendees"><button class="back_btn">Back</button></a>
        <br> <br>

        <h1>Monthly report</h1>

        <br> <br>

        <h2 class="content_h1">Clinic Attendee records</h2>
        <hr class="line">


        <div class="row">

            <div class="report_CA">

                <h4>Midwife's records</h4> <br>
                <table>

                    <!-- <tr>
                        <td>Report

                            No
                        </td>
                        <td>
                            <//?php echo $data['report']->mname; ?>
                    </td>
                    </tr> -->


                    <tr>
                        <td>Weight</td>
                        <td>
                            <?php echo $data['report']->weight; ?>
                        </td>
                    </tr>



                    <tr>
                        <td>height</td>
                        <td>
                            <?php echo $data['report']->height; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>BMI</td>
                        <td>
                            <?php echo $data['report']->bmi; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Blood Pressure</td>
                        <td>
                            <?php echo $data['report']->bloodPressure; ?>
                        </td>
                    </tr>




                    <tr>
                        <td>Allergies</td>
                        <td>
                            <?php echo $data['report']->allergies; ?>
                        </td>
                    </tr>


                    <tr>
                        <td> consanguinity</td>
                        <td>
                            <?php echo $data['report']->consanguinity; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>Rubella Immunization</td>
                        <td>
                            <?php echo $data['report']->rubellaImmunization; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Pre Pregnancy Screening</td>
                        <td>
                            <?php echo $data['report']->prePregnancyScreening; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Pre conceptional FolicAcid</td>
                        <td>
                            <?php echo $data['report']->preconceptionalFolicAcid; ?>


                        </td>
                    </tr>



                    <tr>
                        <td>Subfertility</td>
                        <td>
                            <?php echo $data['report']->subfertility; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Gravidity</td>
                        <td>
                            <?php echo $data['report']->gravidity; ?>

                        </td>
                    </tr>
                    <tr>
                        <td>No of Children</td>
                        <td>
                            <?php echo $data['report']->noofChildren; ?>

                        </td>
                    </tr>

                    <tr>
                        <td>Age of youngest Child</td>
                        <td>
                            <?php echo $data['report']->ageofYoungest; ?>


                        </td>
                    </tr>

                    <tr>
                        <td>last menstrual date</td>
                        <td>
                            <?php echo $data['report']->lastMenstrualDate; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Registration date</td>
                        <td>
                            <?php echo $data['report']->registrationDate; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Expected date of dlivery</td>
                        <td>
                            <?php echo $data['report']->expectedDateofDelivery; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Output</td>
                        <td>
                            <?php echo $data['report']->output; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Comments</td>
                        <td>
                            <?php echo $data['report']->comments; ?>
                        </td>
                    </tr>


























                    <tr>
                        <td>Iron/Forlate</td>
                        <td>
                            <!--?php echo $data['profile']->hname; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Vitamin C</td>
                        <td>
                            <!--?php echo $data['profile']->mcontactno; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Calcium</td>
                        <td>
                            <!--?php echo $data['profile']->mcontactno; ?-->
                        </td>
                    </tr>


                    <tr>
                        <td>Antimarial Drugs</td>
                        <td>
                            <!--?php echo $data['profile']->address; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Triposha</td>
                        <td>
                            <!--?php echo $data['profile']->memail; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Sugar/Albumin</td>
                        <td>
                            <!--?php echo $data['profile']->mlevelofeducation; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Medications</td>
                        <td>
                            <!--?php echo $data['profile']->moccupation; ?-->
                        </td>
                    </tr>



                    <tr>
                        <td>Triposha</td>
                        <td>
                            <!--?php echo $data['profile']->memail; ?-->
                        </td>
                    </tr>




                </table>

            </div>


            <div class="report_CA">
                <h4>Doctor's records</h4>
                <br>
                <table>

                    <tr>
                        <td>Date</td>
                        <td>
                            <!--?php echo $data['profile']->mname; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>BMI</td>
                        <td>
                            <!--?php echo $data['profile']->nic; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>BP</td>
                        <td>
                            <!--?php echo $data['profile']->mage; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Weight Gain</td>
                        <td>
                            <!--?php echo $data['profile']->gravidity; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Sugar/Albumin</td>
                        <td>
                            <!--?php echo $data['profile']->mlevelofeducation; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Medications</td>
                        <td>
                            <!--?php echo $data['profile']->moccupation; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Calcium</td>
                        <td>
                            <!--?php echo $data['profile']->mcontactno; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Antimarial Drugs</td>
                        <td>
                            <!--?php echo $data['profile']->address; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Triposha</td>
                        <td>
                            <!--?php echo $data['profile']->memail; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Iron/Forlate</td>
                        <td>
                            <!--?php echo $data['profile']->hname; ?-->
                        </td>
                    </tr>


                </table>



            </div>

        </div>


    </div>







    <?php require APPROOT . '/views/inc/footer.php'; ?>