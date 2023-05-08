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
                <h2 class="content_h1">Profile</h2>
                <hr class="line">
            </div>

            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data['adminprofile']->name; ?></td>
                </tr>
                <tr>
                    <th>Admin NIC</th>
                    <td><?php echo $data['adminprofile']->nic; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data['adminprofile']->email; ?></td>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <td><?php echo $data['adminprofile']->phone; ?></td>
                </tr>
            </table>

            <button class="button_profile" onclick="editAdmin('<?php echo $data['adminprofile']->name; ?>', '<?php echo $data['adminprofile']->phone; ?>', '<?php echo $data['adminprofile']->email; ?>')">Edit Account info</button>
            
            <table>
                <tr>
                    <th><h2 class="content_h1">Security and Login details</h2></th>
                </tr>
                <tr>
                    <td><a href="<?php echo URLROOT; ?>/admins/changepassword"><button class="button_profile">Change Password</button></a></td>
                </tr>
            </table>
            

            <div id="edit-modal" class="modal">
                <!-- Modal content -->
                <div class="container_new_modal">
                    <span onclick="document.getElementById('edit-modal').style.display='none'" class="close3">&times;</span>
                    <form name="edit-form" action="<?php echo URLROOT; ?>/admins/profile" method="post" onsubmit="return validateForm()">
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

                function editAdmin(name, phone, email) {
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