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
                            <th>Midwife Id</th>
                            <th>Name</th>
                            <th>nic No</th>
                            <th>Contact No</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['midwifes'] as $midwife) : ?>
                            <tr>
                                <td><?php echo $midwife->midwife_id; ?></td>
                                <td><?php echo $midwife->name; ?></td>
                                <td><?php echo $midwife->nic; ?></td>
                                <td><?php echo $midwife->phone; ?></td>
                                <td><?php echo $midwife->email; ?></td>
                                <td><td><a href="<?php echo URLROOT; ?>/midwifes/midwifeprofile/<?php echo $midwife->nic; ?>"><button class="more1999"> More Info </button></a></td></td>
                                <td><i onclick="editMidwife('<?php echo $midwife->name; ?>', '<?php echo $midwife->phone; ?>', '<?php echo $midwife->email; ?>')" class="fa fa-edit" aria-hidden="true"></i></td>
                                <td><i class="fa fa-trash" aria-hidden="true"></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <div id="edit-modal" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-form" action="<?php echo URLROOT; ?>/midwifes" method="post" onsubmit="return validateForm()">
                        <label for="edit-name">Name:</label>
                        <input type="text" id="edit-name" name="edit-name" required>

                        <label for="edit-phone">Phone:</label>
                        <input type="text" id="edit-phone" name="edit-phone" required>
                        <span id="phone-error" class="popup-form-err"></span><br>

                        <label for="edit-email">Email:</label>
                        <input type="email" id="edit-email" name="edit-email" required><br>

                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
 

            <script>
                function validateForm() {
                    var name = document.forms["edit-form"]["edit-name"].value;
                    var phone = document.forms["edit-form"]["edit-phone"].value;
                    var email = document.forms["edit-form"]["edit-email"].value;
                    

                    if (name == "" || email == "" || phone == "") {
                        alert("Please fill out all fields");
                        return false;
                    }

                    // var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
                    // if (!passwordRegex.test(password)) {
                    //     document.getElementById("password-error").innerHTML = "Password must contain at least 8 characters including one uppercase letter, one lowercase letter, and one number";
                    //     document.getElementById("password-error").style.visibility = "visible";
                    //     return false;
                    // } else {
                    //     document.getElementById("password-error").style.visibility = "hidden";
                    //     return true;
                    // }

                    var phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(phone)) {
                        document.getElementById("phone-error").innerHTML = "can not be null";
                        document.getElementById("phone-error").style.visibility = "visible";
                        return false;
                    } else {
                        document.getElementById("phone-error").style.visibility = "hidden";
                        return true;
                    }
                }

                function editMidwife( name, phone, email) {
                    // Get the input fields in the edit form
                    var nameField = document.getElementById("edit-name");
                    var phoneField = document.getElementById("edit-phone");
                    var emailField = document.getElementById("edit-email");

                    // Set the values of the input fields to the data from the row
                    nameField.value = name;
                    phoneField.value = phone;
                    emailField.value = email;

                    // Show the popup modal
                    document.getElementById('edit-modal').style.display='block';
                }


                        
            </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

