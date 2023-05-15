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
    
        <a href="<?php echo URLROOT; ?>/doctorRecords/info/<?php echo $data['mother']->nic; ?>" class="back"><i class="fa fa-backward"></i>  Back</a>
            
        <div class="align">
            <div>
                <h2 class="content_h1">Child Charts - <?php echo $data['mother']->name; ?></h2>
                
                <!-- <h2 class="content_h1">Child Charts - <!?php echo json_encode($data['chart']); ?></h2> -->
            </div>
        </div>

        <canvas id="age-weight-chart"></canvas>

    <script>
        var ageWeightData = <?php echo json_encode($data['chart']); ?>;
        var ageData = ageWeightData.map(function(obj) { return obj.poa; });
        var weightData = ageWeightData.map(function(obj) { return obj.weightgain; });

        var ageWeightChart = new Chart(document.getElementById('age-weight-chart'), {
            type: 'line',
            data: {
                labels: ageData,
                datasets: [{
                    label: 'Weight',
                    data: weightData,
                    fill: false,
                    borderColor: '#8946A6',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'POA'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Weight Gain'
                        }
                    }
                }
            }
        });
    </script>
            
    






<?php require APPROOT . '/views/inc/footer.php'; ?>


