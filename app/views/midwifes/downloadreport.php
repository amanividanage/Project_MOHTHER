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

    <div class="chart-d item12" id="Chart3">
                    <h2>New Registrants</h2>
                    <!-- <form action="" method="POST" class="reportgen">
                        
                        <input type="date" name="date1" id="date1">
                        
                        <input type="date" name="date2" id="date2">

                        <input type="submit"> -->

                        <!-- <a href="<!?php echo URLROOT; ?>/midwifes/downloadreport">Generate Report</a> -->
                        <!-- <input type="submit" value="Submit"> -->
                    </form>  
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>NIC</th>
                                <th>Age</th>
                                <th>Level Of Education</th>
                                <th>Occupation</th>
                                <th>Contact No</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['getreport'] as $date) : ?>
                                <tr>
                                    <td><?php echo $date->date; ?></td>
                                    <td><?php echo $date->mname; ?></td>
                                    <td><?php echo $date->nic; ?></td>
                                    <td><?php echo $date->mage; ?></td>
                                    <td><?php echo $date->mlevelofeducation; ?></td>
                                    <td><?php echo $date->moccupation; ?></td>
                                    <td><?php echo $date->mcontactno; ?></td>
                                    <td><?php echo $date->memail; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- <div class="chart-d item4">
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

<script>
    window.addEventListener('load', function() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 750);
    });
</script>
