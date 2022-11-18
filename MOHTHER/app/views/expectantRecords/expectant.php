<?php require APPROOT . '/views/inc/header.php'; ?>

olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
olaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa






<div class="column">
            <table>
                <tr>
                    <th>Individual information</th>
                    <th></th>
                    
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>Email</th>
                    <th>Tel.No</th>
                </tr>
                <?php 
                                    $con = mysqli_connect("localhost","root","","m2");

                                    if(isset($_GET['nic']))
                                    {
                                        $stud_id = $_GET['nic'];

                                      //  $query = "SELECT * FROM registration WHERE nic='$stud_id' ";
                                     //  $data['expectantRecords'] = mysqli_query($con, $query);

                                        if(mysqli_num_rows($data['expectantRecords']) > 0)
                                        {
                                            foreach($data['expectantRecords']as $expectantRecords)  
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" value="<?php echo $data['expectatntnic']->nic; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Class</label>
                                                    <input type="text" value="<?php echo $expectantRecords->memail; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">password</label>
                                                    <input type="text" value="" class="form-control">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>
            </table>
        </div>
    </div>



    <?php require APPROOT . '/views/inc/footer.php'; ?>


<!--?php require APPROOT . '/views/inc/footer.php'; ?-->