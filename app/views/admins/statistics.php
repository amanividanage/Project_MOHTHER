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
            <div>
                <div>
                    <h1 class="content_h1">Statistics</h1>
                    <br>
                </div>

                <div class="charts-dd">
                    <div class="chart-dd item10">
                        <h2>New Registrants -</h2>
                        <h2> Monthly Wise</h2><br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>New Registrants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                    <div class="chart-dd item11" id="doughnut-chart">
                        <h2>New Registrants - </h2>
                        <h2>Year Wise</h2><br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>New Registrants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                    <div class="chart-dd item12" id="doughnut-chart">
                        <h2>New Registrants - </h2>
                        <h2>Clinic Wise</h2><br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Clinic Name</th>
                                    <th>New Registrants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data['newRegistrantsClinic'] as $registrant) {
                                        echo "<tr>";
                                        echo "<td>" . $registrant['label'] . "</td>";
                                        echo "<td>" . $registrant['value'] . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                
            
                
            </div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>