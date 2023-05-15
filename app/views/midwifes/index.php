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
                    <h2 class="content_h1">Midwives</h2>
                    <hr class="line">
                    <br>
                </div>
                <div class="search_add">
                    <form action="" method="GET">
                        <div class="search">
                            <input type="search" name="search" placeholder="Search here...">
                            <!--button type="submit" class="search_icon"><i class="fa fa-search"></i></button-->
                        </div>
                    </form>

                    <div>
                        <a href="<?php echo URLROOT; ?>/midwifes/add"><button class="add">Add Midwife</button></a>
                    </div>
                    
                </div>
            
                <div>
                    <table>
                        <tr>
                            <th>Midwife Details</th>
                            <th></th>
                        </tr>
                        <tr>
                            <!-- <th>Midwife Id</th> -->
                            <th>Name</th>
                            <th>nic No</th>
                            <th>Contact No</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['midwifes'] as $midwife) : ?>
                            <tr>
                                <!-- <td><!?php echo $midwife->midwife_id; ?></td> -->
                                <td><?php echo $midwife->name; ?></td>
                                <td><?php echo $midwife->nic; ?></td>
                                <td><?php echo $midwife->phone; ?></td>
                                <td><?php echo $midwife->email; ?></td>
                                <td><td><a href="<?php echo URLROOT; ?>/midwifes/midwifeprofile/<?php echo $midwife->nic; ?>"><button class="more1999"> More Info </button></a></td></td>
                                <!-- <td><i class="delete-icon fa fa-trash" onclick="checkDelete(<!?php echo $data['midwifes']->nic; ?>)"></i></td> -->
                                <td>
                                    <form id="delete-form-<?php echo $midwife->nic; ?>" action="<?php echo URLROOT; ?>/midwifes/delete/<?php echo $midwife->nic; ?>" method="post">
                                        <input type="hidden" name="nic" value="<?php echo $midwife->nic; ?>">
                                        <i class="delete-icon fa fa-trash" onclick="if (checkDelete()) document.getElementById('delete-form-<?php echo $midwife->nic; ?>').submit();"></i>
                                    </form>
                                </td>
                                <!-- <td><i class="delete-icon fa fa-trash" onclick="return checkDelete()"></i></td> -->
                                <!-- <td><i onclick="editMidwife('<!?php echo $midwife->name; ?>', '<!?php echo $midwife->phone; ?>', '<!?php echo $midwife->email; ?>')" class="fa fa-edit" aria-hidden="true"></i></td> -->
                                <!-- <td><i class="delete-icon fa fa-trash" data-midwife-id="<!?php echo $midwife->midwife_id; ?>" aria-hidden="true"></i></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <!-- Delete form for each midwife record -->
            <!-- <form id="delete-form-<!?php echo $data['midwifes']->nic; ?>" action="<!?php echo URLROOT; ?>/midwifes/delete/<!?php echo $data['midwifes']->nic; ?>" method="post">
                <label>Are you sure you want to delete this midwife from the system?</label>
                <input type="submit" value="Yes" class="curve_btn">
                <button type="button" class="curve_btn" onclick="closeModal(<!?php echo $data['midwifes']->nic; ?>)">No</button>
            </form> -->

            <!-- Modify your modal box to add a unique id to each modal -->
           
                <!-- <div id="myModalnew<!?php echo $data['midwifes']->midwife_id; ?>" class="modal">
                    <!- Modal content -->
                    <!-- <div class="modal-content">
                        <span class="close">&times;</span>
                        <form id="delete-form-<!?php echo $data['midwifes']->midwife_id; ?>" action="<!?php echo URLROOT; ?>/midwifes/delete/<!?php echo $data['midwifes']->midwife_id; ?>" method="post">
                                <label> Are you sure you want to delete this midwife from the system?</label>
                                <input type="submit" value="Yes" class="curve_btn">
                                <button type="button" class="curve_btn" onclick="closeModal(<!?php echo $data['midwifes']->midwife_id; ?>)">No</button>
                        </form>
                    
                    </div> -->
                <!-- </div>  -->

                <!-- <script>
                    function checkDelete(midwifeNIC) {
                        if (confirm('Are you sure you want to delete this record?')) {
                            var formId = 'delete-form-' + midwifeNIC;
                            document.getElementById(formId).submit();
                        }
                    }
                </script> -->
            
            <script>
                function checkDelete() {
                    return confirm('Are you sure you want to delete this record');
                }
            </script>

            <script src="<?php echo URLROOT ; ?>/js/admin.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

