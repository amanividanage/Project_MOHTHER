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
        
        <h1 class="content_h1"> Statistics</h1>

        <div class="charts-d">
                <div class="chart-d item10">
                    <h2>New Registrants - Monthly Wise</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>New Registrants</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $newRegistrants = getNewRegistrantsMonthWise();
                                foreach ($data['newRegistrants'] as $registrant) {
                                    echo "<tr>";
                                    echo "<td>" . $registrant['label'] . "</td>";
                                    echo "<td>" . $registrant['value'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="chart-d item11" id="doughnut-chart">
                    <h2>New Registrants - Year Wise</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>New Registrants</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $newRegistrants = getNewRegistrantsMonthWise();
                                foreach ($data['newRegistrantsYear'] as $registrant) {
                                    echo "<tr>";
                                    echo "<td>" . $registrant['label'] . "</td>";
                                    echo "<td>" . $registrant['value'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="chart-d item3" id="Chart3">
                    <h2>Children - Special attenden disorders</h2>
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="chart-d item4">
                    <h2>New Registrants</h2>
                    <canvas id="myChart4"></canvas>
                </div>
                <div class="chart-d item5">
                    <h2>New Registrants</h2>
                </div>
                <div class="chart-d item6">
                    <h2>Risky expectants</h2>
                    
                </div> -->
                
            </div>

            
</div>
