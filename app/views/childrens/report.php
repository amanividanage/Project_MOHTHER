<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife_children.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- full calendar CDN  -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
        <div class="content">
        <a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $data['child']->child_id; ?>" class="back"><i class="fa fa-backward"></i>Back</a>
        <div class="container_new">
                <h2>Add Report of the child</h2>
                <p>Please enter child's monthly reports</p>

                <form action="<?php echo URLROOT; ?>/childrens/report/<?php echo $data['child']->child_id; ?>" method="post">

                    
                    <!-- <div>
                        <label for="reportno">Report No: <sup>*</sup></label>
                        <input type="text" name="reportno" placeholder="Enter report no here...">
                        <span class="form-err"><!?php echo $data['reportno_err']; ?></span>
                    </div> -->
                    <h4>Info about child growth</h4>
                    <div>
                        <label for="skin">Skin color: <sup>*</sup></label>
                        <input type="text" name="skin" placeholder="Enter nature of the skin color of the baby here...">
                        <span class="form-err"><?php echo $data['skin_err']; ?></span>
                    </div>
                    <div>
                        <label for="eye">Eye sight: <sup>*</sup></label>
                        <input type="text" name="eye" placeholder="Enter nature of the eye signt of the baby here...">
                        <span class="form-err"><?php echo $data['eye_err']; ?></span>
                    </div>
                    <div>
                        <label for="temp">Body temperature  (in Celsius):  <sup>*</sup></label>
                        <input type="text" name="temp" placeholder="Enter body temperature of the baby here...">
                        <span class="form-err"><?php echo $data['temp_err']; ?></span>
                    </div>
                    <div>
                        <label for="umbilicus">Nature of the umbilicus: <sup>*</sup></label>
                        <input type="text" name="umbilicus" placeholder="Enter nature of the umbilicus of the baby here...">
                        <span class="form-err"><?php echo $data['umbilicus_err']; ?></span>
                    </div>
                    <div>
                        <label for="weight">Current weight(In Kg): <sup>*</sup></label>
                        <input type="text" name="weight" placeholder="Enter current weight in Kg...">
                        <span class="form-err"><?php echo $data['weight_err']; ?></span>
                    </div>
                    <div>
                        <label for="other">Other Complications (If any) : </label>
                        <input type="text" name="other" placeholder="Enter other compications of baby if any...">
                        <span class="form-err"><?php echo $data['other_err']; ?></span>
                    </div>
                    <div>
                        <label for="nextAppointmentDate">Next Appointment Date</label>
                        <input type="Date" name="nextAppointmentDate" min="2023-05-16">
                        <span class="form-err"><?php echo $data['other_err']; ?></span>
                    </div>
                    <tr>
   
    
                    
                    <input type="submit" value="Submit">
                    
                </form>
                </form>
    <div class= "calendarcontent_form">
    
    <!-- <div class ="calendar-container-form"> -->
    <div id ="calendar">
       
    
    </div>
    <script src="<?= URLROOT ?>/js/maternityCalendar.js"></script>
            </div>
            <br>
                <br>
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>