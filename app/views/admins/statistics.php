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

                    <div class="chart-dd item13" id="doughnut-chart">
                        <h2>Child Vaccination - Total Vaccinated List</h2>
                        <!-- Display the vaccine dropdown and form -->
                        <form action="" method="POST">
                            <select name="vaccine" id="vaccine" onchange="this.form.submit()">
                                <option value="" disabled selected>Select Vaccine</option>
                                <option value="BCG">BCG</option>
                                <option value="Pentavalent 1">Pentavalent 1</option>
                                <option value="OPV 1">OPV 1</option>
                                <option value="FIPV 1">FIPV 1</option>
                                <option value="Pentavalent 2">Pentavalent 2</option>
                                <option value="OPV 2">OPV 2</option>
                                <option value="FIPV 2">FIPV 2</option>
                                <option value="Pentavalent 3">Pentavalent 3</option>
                                <option value="OPV 3">OPV 3</option>
                            </select>
                            <!-- <input type="submit" value="Submit"> -->
                        </form>

                        <!-- Display the child vaccination data for the selected vaccine -->
                        <!-- <!?php if (!empty($data['childVaccinations'])) : ?> -->
                            <table>
                                <thead>
                                    <tr>
                                        <th>Child name</th>
                                        <th>Parent NIC</th>
                                        <th>Child Date of Birth</th>
                                        <th>Date of Registration</th>
                                        <th>Birth Weight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data['vaccine'] as $vaccine) : ?>
                                        <tr>
                                            <td><?php echo $vaccine->name; ?></td>
                                            <td><?php echo $vaccine->parent; ?></td>
                                            <td><?php echo $vaccine->dob; ?></td>
                                            <td><?php echo $vaccine->date; ?></td>
                                            <td><?php echo $vaccine->weight; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <!-- <!?php else: ?>
                            <p>No child vaccination data available for the selected vaccine.</p>
                        <!?php endif; ?> -->


                        
                    </div>
                    
                </div>
                
            
                
            </div>

            <!-- <script>
                $(document).ready(function(){
                    $("#fetchval").on('change',function(){
                        var value = $(this).val();
                        //alert(value);

                        $.ajax({
                            url: "http://localhost/MOHTHER/admins/new_statistics",
                            type: "POST",
                            data: 'request=' + value;
                            beforeSend: function(){
                                $(".container").html("<span>Working....</span>");
                            },
                            success:function(){
                                $(".container").html(data);
                            }
                        })
                    });
                });
            </script> -->

    
<?php require APPROOT . '/views/inc/footer.php'; ?>