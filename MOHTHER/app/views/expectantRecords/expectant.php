<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
    <div class="content">
        <div class="content_expectant2">
           
                <div>
                    <table>
                        <tr>
                            <th>Monthly Record by Midwife </th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Report No</td>
                            <td><?php echo $data['singlereport']->reportNo; ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo $data['singlereport']->date; ?></td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td><?php echo $data['singlereport']->weight; ?></td>
                        </tr>
                        <tr>
                            <td>Vaccination</td>
                            <td><?php echo $data['singlereport']->vaccination; ?></td>
                        </tr>
                        <tr>
                            <td>Iron /Forlate</td>
                            <td><?php echo $data['singlereport']->ironorForlate; ?></td>
                        </tr>
                        <tr>
                            <td>Vitamin C</td>
                            <td><?php echo $data['singlereport']->vitaminC; ?></td>
                        </tr>
                        <tr>
                            <td>Calcium</td>
                            <td><?php echo $data['singlereport']->calcium; ?></td>
                        </tr>
                        <tr>
                            <td>Antimarial Drugs</td>
                            <td><?php echo $data['singlereport']->antimarialDrugs; ?></td>
                        </tr>
                        <tr>
                            <td>Triposha</td>
                            <td><?php echo $data['singlereport']->triposha; ?></td>
                        </tr>
                        <tr>
</div>
               

                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>