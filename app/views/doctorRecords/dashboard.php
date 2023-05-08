<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_doctor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_doctor.php' ; ?>
    <div class="content">
        
            <h1 class="content_h1">Doctor Dashboard</h1>

            <div class="cards-d">
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['expectant']; ?></div>
                        <div class="card-d-name">Expectant Mothers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            
            
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['children']; ?></div>
                        <div class="card-d-name">Children</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-child"></i>
                    </div>
                </div>

                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['risky']; ?></div>
                        <div class="card-d-name">Current Risky Mothers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-frown-o"></i>
                    </div>
                </div>
                
                <!-- <div class="card-d">
                    <div class="card-d-content">
                        <div class="number">1234</div>
                        <div class="card-d-name">Mother Death</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-user-times"></i>
                    </div>
                </div> -->
            </div>

            <div class="charts-d">
                <div class="chart-d item1">
                    <h2>Children - Special attenden disorders</h2>
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="chart-d item2" id="doughnut-chart">
                    <h2>Risky Expectant Mothers</h2>
                    <table>
                        <tr>
                            <th>High Risk</th>
                        </tr>
                        <?php foreach($data['highrisk_list'] as $highrisk_list) : ?>
                                <tr>
                                    <td><?php echo $highrisk_list->nic ?></td>
                                    <td><?php echo $highrisk_list->name; ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/doctorRecords/info/<?php echo $highrisk_list->nic ?>"><i class="fa fa-angle-double-right"></i></a></td>
                                </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th>Moderate Risk</th>
                        </tr>
                        <?php foreach($data['moderaterisk_list'] as $moderaterisk_list) : ?>
                                <tr>
                                    <td><?php echo $moderaterisk_list->nic ?></td>
                                    <td><?php echo $moderaterisk_list->name; ?></td>
                                    <td><a href="<?php echo URLROOT; ?>/doctorRecords/info/<?php echo $moderaterisk_list->nic ?>"><i class="fa fa-angle-double-right"></i></a></td>
                                </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <!-- <div class="chart-d item3" id="Chart3">
                    <h2>Children - Special attenden disorders</h2>
                    
                </div>
                <div class="chart-d item4">
                    <h2>New Registrants</h2>
                </div>
                <div class="chart-d item5">
                    <h2>Risky expectants</h2>
                </div> -->
            </div>
                
            
            <script>
                /*Chart2..........................................*/ 
                //var piechartData = <!?php echo json_encode($data['chart']); ?>;
                // var xValues = piechartData.map(function(obj) { return obj.label; });
                // var yValues = piechartData.map(function(obj) { return obj.value; });
                // var barColors = [
                // "#8946A6",
                // "#c287de",
                // ];

                // new Chart("myChart2", {
                // type: "pie",
                // data: {
                //     labels: xValues,
                //     datasets: [{
                //     backgroundColor: barColors,
                //     data: yValues
                //     }]
                // },
                // options: {
                //     // responsive: false,
                //     title: {
                //     display: true,
                //     text: "World Wide Wine Production 2018"
                //     }
                // }
                // });

                /*chart3................................*/ 
                var barchartData = <?php echo json_encode($data['chart2']); ?>;
                var xValues2 = barchartData.map(function(obj) { return obj.label; });
                var yValues2 = barchartData.map(function(obj) { return obj.value; });
                var barColors2 = ["#8946A6", "#c287de","#8946A6","#c287de"];

                new Chart("myChart3", {
                type: "bar",
                data: {
                    labels: xValues2,
                    datasets: [{
                    backgroundColor: barColors2,
                    data: yValues2
                    }]
                },
                options: {
                    // responsive: false,
                    legend: {display: false},
                    title: {
                    display: true,
                    
                    }
                }
                });

            </script>
               

                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
</body>
</html>