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
                    <h2 class="content_h1">Admins</h2>
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
                        <a href="<?php echo URLROOT; ?>/admins/add"><button class="add">Add Admin</button></a>
                    </div>
                    
                </div>
            
                <div>
                    <table>
                        <tr>
                            <th>Admin Details</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Admin Id</th>
                            <th>Name</th>
                            <th>nic No</th>
                            <th>Contact No</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['admins'] as $admin) : ?>
                            <tr>
                                <td><?php echo $admin->admin_id; ?></td>
                                <td><?php echo $admin->name; ?></td>
                                <td><?php echo $admin->nic; ?></td>
                                <td><?php echo $admin->phone; ?></td>
                                <td><?php echo $admin->email; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>