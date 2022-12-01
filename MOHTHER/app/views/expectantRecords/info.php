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
        <div class="content_expectant2">
           
                <div>
                    <table>
                        <tr>
                            <th> Basic Info </th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Name : </td>
                            <td><?php echo $data['info']->mname; ?></td>
                        </tr>
                        <tr>
                            <td>Age :</td>
                            <td><?php echo $data['info']->mage; ?></td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td><?php echo $data['info']->address; ?></td>
                        </tr>
                        <tr>
                            <td>Occupation:</td>
                            <td><?php echo $data['info']->moccupation; ?></td>
                        </tr>
                        <tr>
                            <td>Tel.No :</td>
                            <td><?php echo $data['info']->mcontactno; ?></td>
                        </tr>
                       
                       
                    </table>
                </div>
</div>
                <div class="infobutton">
                 <th><a href="<?php echo URLROOT; ?>/expectantRecords/add" class= "updateDeliveredbutton" > Add Report</a></th>
                
                </div>
                
        <div class="dailyrecords">
         <div>
            
            <h2 class="content_h1">Monthly Records</h2>
            <hr class="line">
        </div>
        <div class= "newregdetails">
            <table>
                
                <tr>
                    <th>Report No</th>
                    <th>Date</th>
                    <th>Weight</th>
                    <th>Triposha</th>
                    
                </tr>
                <?php foreach($data['report'] as $report):?>
                    <tr>
                    <th><a href="<?php echo URLROOT; ?>/expectantRecords/expectant/<?php echo $report->reportNo; ?>"><?php echo $report->reportNo; ?></a> </th>
                        <th><?php echo $report->date; ?></th>
                        <th><?php echo $report->weight; ?></th> 
                        <th><?php echo $report->triposha; ?></th>
                        <th><a href="<?php echo URLROOT; ?>/expectantRecords/expectant" class= "updateDeliveredbutton" > Add</a></th>
     
                                    
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
 </div>
                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--th><a href="expectant/<!?php echo $report->reportNo; ?>"><!?php echo $report->reportNo; ?></a> </th>
