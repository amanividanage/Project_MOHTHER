<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife_children.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
        <div class="content">
        <a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $data['child']->child_id; ?>" class="back"><i class="fa fa-backward"></i>Back</a>
            <div>
                <div>
                    <h2 class="content_h1">Vaccination - <?php echo $data['child']->name; ?></h2>
                    <h2 class="content_h2">Immunization Vaccines</h2>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>At birth</td>
                                <td>BCG</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="3">2 months completed</td>
                                <td>Pentavalent 1</td>
                            </tr>

                            <tr>
                                <td>OPV 1</td>
                            </tr>

                            <tr>
                                <td>FlPV 1</td>
                            </tr>

                            <tr>
                                <td rowspan="3">4 months completed</td>
                                <td>Pentavalent 1</td>

                            </tr>

                            <tr>
                                <td>OPV 2</td>
                            </tr>

                            <tr>

                                <td>FlPV 2</td>
                            </tr>

                            <tr>
                                <td rowspan="2">6 months completed</td>
                                <td>Pentavalent 3</td>
                            </tr>

                            <tr>
                                <td>OPV 3</td>
                            </tr>

                            <tr>
                                <td>9 months completed</td>
                                <td>Measles Mumps Rubella 1</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>12 months completed</td>
                                <td>Live JE</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="2">18 months completed</td>
                                <td>DPT</td>
                            </tr>

                            <tr>
                                <td>OPV 4</td>
                            </tr>

                            <tr>
                                <td>3 years completed</td>
                                <td>Measles Mumps Rubella 2</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td rowspan="2">5 years completed</td>
                                <td>DP</td>
                            </tr>

                            <tr>
                                <td>OPV 5</td>
                            </tr>

                            <tr>
                                <td rowspan="2">10 years completed</td>
                                <td>HPV Vaccine 1</td>
                            </tr>

                            <tr>
                                <td>HPV Vaccine 2</td>
                            </tr>

                            <tr>
                                <td>11 years completed</td>
                                <td>Adult tetanus and diphtheria</td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
            </div>

            <br>
            <br>
            <br>

            

            

            

            
            
               
            
            

            
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>