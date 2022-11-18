<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS with the password</title>
    
</head>
<body>
    
    <div class="Registration_sms">
         <h4>Sending the password</h4>
                 
                    

        <form action="" method="GET">
                          
            
            <input type="text" name="nic" value="<?php if(isset($_GET['nic'])){echo $_GET['nic'];} ?>" class="form-control">
                               
                           
            <button type="submit" >Search</button>
                             
             </form>

               <hr>
                  <?php 
                                    $con = mysqli_connect("localhost","root","","m2");

                                    if(isset($_GET['nic']))
                                    {
                                        $stud_id = $_GET['nic'];

                                       $results = "SELECT * FROM registration WHERE nic='$stud_id' ";
                                        $query_run = mysqli_query($con, $results);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <label for="">NIC</label>
                                                    <input type="text" value="<?= $row['nic']; ?>" class="form-control">
                                               
                                                    <label for="">email</label>
                                                    <input type="text" value="<?= $row['memail']; ?>" class="form-control">
                                               
                                               
                                                    <label for="">Contact no</label>
                                                    <input type="text" value="<?= $row['mcontactno']; ?>" class="form-control">
                                                
                                              
                                                    <label for="">password</label>
                                                    <input type="text" value="" class="form-control">

                                                    <input type="submit" name="Submit" class="myButton"></input>
                                                
                                                <?php
                                            }
                                            

                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                          
      
              

   
</body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>
