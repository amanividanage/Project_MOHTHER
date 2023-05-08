<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
        <div class="content">
            <div>
                <h2 class="content_h1">Admin dashboard</h2>
            </div>

            <div class="cards-d">
                <!-- <div class="card-d">
                    <div class="card-d-content">
                        <div class="number">1234</div>
                        <div class="card-d-name">Doctors</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number">1234</div>
                        <div class="card-d-name">Midwives</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-user"></i>
                    </div>
                </div> -->
            
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['total_clinicattendees']; ?></div>
                        <div class="card-d-name">Clinic Attendees</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            
            
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['total_children']; ?></div>
                        <div class="card-d-name">Children</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-child"></i>
                    </div>
                </div>

                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number"><?php echo $data['child_deaths']; ?></div>
                        <div class="card-d-name">Child Death</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-frown-o"></i>
                    </div>
                </div>
                
                <div class="card-d">
                    <div class="card-d-content">
                        <div class="number">1234</div>
                        <div class="card-d-name">Mother Death</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-user-times"></i>
                    </div>
                </div>
            </div>

            <div class="charts-d">
                <div class="chart-d">
                    <h2>Death related to maternal births</h2>
                </div>
                <div class="chart-d" id="doughnut-chart">
                    <h2>Clinic Attendees</h2>
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="chart-d">
                    <h2>Children - Special attenden disorders</h2>
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="chart-d">
                    <h2>MOH Staff</h2>
                    <canvas id="myChart4"></canvas>
                </div>
            </div>
                
            
            <script>
                /*Chart2..........................................*/ 
                var piechartData = <?php echo json_encode($data['chart']); ?>;
                var xValues = piechartData.map(function(obj) { return obj.label; });
                var yValues = piechartData.map(function(obj) { return obj.value; });
                var barColors = [
                "#8946A6",
                "#c287de",
                ];

                new Chart("myChart2", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: "World Wide Wine Production 2018"
                    }
                }
                });

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
                    legend: {display: false},
                    title: {
                    display: true,
                    
                    }
                }
                });

                /*Chart4..........................................*/ 
                var piechart2Data = <?php echo json_encode($data['chart3']); ?>;
                var xValues3 = piechart2Data.map(function(obj) { return obj.label; });
                var yValues3 = piechart2Data.map(function(obj) { return obj.value; });
                var barColors = [
                "#8946A6",
                "#c287de",
                ];

                new Chart("myChart4", {
                type: "pie",
                data: {
                    labels: xValues3,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues3
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: "World Wide Wine Production 2018"
                    }
                }
                });

            </script>
                
            

<?php require APPROOT . '/views/inc/footer.php'; ?>