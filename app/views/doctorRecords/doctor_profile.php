<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_doctor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_doctor.php' ; ?>
        <div class="content">

            <div> 
                <h2 class="content_h1">Profile</h2>
                <hr class="line">
            </div>

            <!-- <div class= "newregdetails">
                <div>
                    <a href="<!?php echo URLROOT; ?>/children"><button class="add">Edit Profile Photo</button></a>
                </div>
            </div> -->

            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data['doctorprofile']->name; ?></td>
                </tr>
                <tr>
                    <th>Employee id</th>
                    <td><?php echo $data['doctorprofile']->doctor_id; ?></td>
                </tr>
                <tr>
                    <th>Employee NIC</th>
                    <td><?php echo $data['doctorprofile']->nic; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data['doctorprofile']->email; ?></td>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <td><?php echo $data['doctorprofile']->phone; ?></td>
                </tr>        
                <tr>
                    <th>Clinic No</th>
                    <td>
                        <?php 
                            if(!empty($data['doctorclinic'])) {
                                echo $data['doctorclinic']->clinic_name; 
                            } else {
                                echo 'Not Appointed to any clinic';
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <button onclick="editDoctor('<?php echo $data['doctorprofile']->name; ?>', '<?php echo $data['doctorprofile']->phone; ?>', '<?php echo $data['doctorprofile']->email; ?>')">Edit Account info</button>
            
            <table>
                <tr>
                    <th><h2 class="content_h1">Security and Login details</h2></th>
                </tr>
                <tr>
                    <td><a href="<?php echo URLROOT; ?>/doctorRecords/changepassword"><button>Change Password</button></a></td>
                </tr>
            </table>
            

            <div id="edit-modal" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-form" action="<?php echo URLROOT; ?>/doctorRecords/doctor_profile" method="post" onsubmit="return validateForm()">
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

            <!-- <div id="edit-password-modal" class="modal">
                <! Modal content -->
                <!-- <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-password-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-password-form" action="<!?php echo URLROOT; ?>/doctorRecords/doctor_profile" method="post" onsubmit="return validatePasswordForm()">
                        <label for="current-password">Current Password:</label>
                        <input type="password" id="current-password" name="current-password" required>

                        <label for="new-password">New Password:</label>
                        <input type="password" id="new-password" name="new-password" required>
                        <span id="password-error" class="popup-form-err"></span><br>

                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                        <span id="confirm-password-error" class="popup-form-err"></span><br>

                        <input type="submit" value="Save">
                    </form>
                </div> -->
            <!-- </div> -->


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
                        document.getElementById("phone-error").innerHTML = "Invalid Phone Number";
                        document.getElementById("phone-error").style.visibility = "visible";
                        return false;
                    } else {
                        document.getElementById("phone-error").style.visibility = "hidden";
                        return true;
                    }
                }

                function editDoctor(name, phone, email) {
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

                // function editPassword() {
                //     // Show the popup modal
                //     document.getElementById('edit-password-modal').style.display='block';
                // }

                // function validatePasswordForm() {
                //     var currentPassword = document.forms["edit-password-form"]["current-password"].value;
                //     var newPassword = document.forms["edit-password-form"]["new-password"].value;
                //     var confirmPassword = document.forms["edit-password-form"]["confirm-password"].value;

                //     if (currentPassword == "" || newPassword == "" || confirmPassword == "") {
                //         alert("Please fill out all fields");
                //         return false;
                //     }

                //     // Perform validation to check if the entered current password matches the stored hashed password
                //     var storedHashedPassword = "<!?php echo $data['doctorprofile']->password; ?>";
                //     var enteredCurrentPassword = currentPassword;
                //     var hashedEnteredCurrentPassword = sha256(enteredCurrentPassword);
                //     if (hashedEnteredCurrentPassword != storedHashedPassword) {
                //         document.getElementById("password-error").innerHTML = "Incorrect password";
                //         document.getElementById("password-error").style.visibility = "visible";
                //         return false;
                //     }

                //     var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
                //     if (!passwordRegex.test(newPassword)) {
                //         document.getElementById("password-error").innerHTML = "Password must contain at least 8 characters including one uppercase letter, one lowercase letter, and one number";
                //         document.getElementById("password-error").style.visibility = "visible";
                //         return false;
                //     } else {
                //         document.getElementById("password-error").style.visibility = "hidden";
                //     }

                //     if (newPassword != confirmPassword) {
                //         document.getElementById("confirm-password-error").innerHTML = "Passwords do not match";
                //         document.getElementById("confirm-password-error").style.visibility = "visible";
                //         return false;
                //     } else {
                //         document.getElementById("confirm-password-error").style.visibility = "hidden";
                //     }

                //     return true;
                //}
                                


                        
            </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

