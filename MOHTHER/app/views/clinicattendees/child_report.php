<?php require APPROOT . '/views/inc/header.php'; ?>

<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
    <div class="content">

        <a href="<?php echo URLROOT; ?>/clinicattendees/particular_child"><button class="back_btn">Back</button></a>
        <br><br>


        <h1>Monthly report</h1>


        <h2 class="content_h1">Child records</h2>
        <hr class="line">


        <div class="row_re">

            <div class="report_CA">

                <h4>By Midwife</h4> <br>
                <table>

                    <tr>
                        <td>Date</td>
                        <td>
                            <!--?php echo $data['child_report']->date; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>BMI</td>
                        <td>
                            <!--?php echo $data['child_report']->bmi; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Blood Pressure</td>
                        <td>
                            <!--?php echo $data['child_report']->bp; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Weight Gain</td>
                        <td>
                            <!--?php echo $data['child_report']->iweigght_gain; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Sugar/Albumin</td>
                        <td>
                            <!--?php echo $data['child_report']->ugar/Albumin; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Medications</td>
                        <td>
                            <!--?php echo $data['child_report']->Medications; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Calcium</td>
                        <td>
                            <!--?php echo $data['child_report']->	Calcium; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Antimarial Drugs</td>
                        <td>
                            <!--?php echo $data['child_report']->Antimarial_drugs; ?-->
                        </td>
                    </tr>
                    <tr>
                        <td>Triposha</td>
                        <td>
                            <!--?php echo $data['child_report']->memail; ?-->
                        </td>
                    </tr>

                    <tr>
                        <td>Iron/Forlate</td>
                        <td>
                            <!--?php echo $data['child_report']->hname; ?-->
                        </td>
                    </tr>


                </table>

            </div>


            <div class="report_CA">
                <h4>By Doctor</h4>
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

                <br> <br> <br>

            </div>

        </div>

        <!--table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight Gain</th>
                    <th>Skin color</th>
                    <th>Eye sight</th>
                    <th>Temperature</th>
                    <th>Nature of the umbilicus</th>
                    <th>Medications</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>



            </tbody>
        </table-->









        <?php require APPROOT . '/views/inc/footer.php'; ?>