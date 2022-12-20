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
                        <th> Basic Info </th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Name : </th>
                        <td><?php echo $data['info']->mname; ?></td>
                    </tr>
                    <tr>
                        <th>Age :</th>
                        <td><?php echo $data['info']->mage; ?></td>
                    </tr>
                    <tr>
                        <th>Address :</th>
                        <td><?php echo $data['info']->address; ?></td>
                    </tr>
                    <tr>
                        <th>Occupation:</th>
                        <td><?php echo $data['info']->moccupation; ?></td>
                    </tr>
                    <tr>
                        <th>Tel.No :</th>
                        <td><?php echo $data['info']->mcontactno; ?></td>
                    </tr>
                    <tr>
                    <th><a href="<?php echo URLROOT; ?>/childrens_expectant/add/<?php echo $data['info']->nic; ?>" class= "updateDeliveredbutton" > Add Child</a></th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="content_child_midwifepage">
            <table>
                <tr>
                    <th colspan=3>Children</th>
                </tr>
                <?php foreach($data['children'] as $children) : ?>
                    <tr>
                        <td><a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $children->child_id; ?>"><?php echo $children->child_id; ?></a></td>
                        <td><?php echo $children->name; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    


                <div class="infobutton">
             
                 <th><a href="<?php echo URLROOT; ?>/expectantRecords/add/<?php echo $data['info']->nic; ?>" class= "updateDeliveredbutton" > Add Report</a></th>
                 

                </div>
                
        <div class="dailyrecords">
        
        <div class= "newregdetails">
        <div>
            
            <h2 class="content_h3">Monthly Records</h2>
            <hr class="line">
        </div>
            <table>
                
                <tr>
                    <th>Report No</th>
                    <th>Date</th>
                    <th>Weight</th>
                    <th>Triposha</th>
                    
                </tr>
                <?php foreach($data['report'] as $report):?>
                    <tr>
                    <th><?php echo $report->reportNo; ?></a> </th>
                        <td><?php echo $report->date; ?></td>
                        <td><?php echo $report->weight; ?></td> 
                        <td><?php echo $report->triposha; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/expectantRecords/expectant/<?php echo $data['info']->nic; ?>/<?php echo $report->reportNo; ?>" class= "updateDeliveredbutton" > More Info</a></td>
                        
     
                                    
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
                
</div>
 </div>
                        
    
<?php require APPROOT . '/views/inc/footer.php'; ?>
<!--th><a href="expectant/<!?php echo $report->reportNo; ?>"><!?php echo $report->reportNo; ?></a> </th>
<td><input type="text" name="nic" maxlength="20" value="<!?php echo $data['info']->nic; ?>">