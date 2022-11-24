<?php require APPROOT . '/views/inc/header.php'; ?>
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
                <div>
                    <a href="<?php echo URLROOT; ?>/admins/add"><button class="add">Add Admin</button></a>
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
                            <th>Identity No</th>
                            <th>Contact No</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['admins'] as $admin) : ?>
                            <tr>
                                <td><?php echo $admin->admin_id; ?></td>
                                <td><?php echo $admin->name; ?></td>
                                <td><?php echo $admin->identity; ?></td>
                                <td><?php echo $admin->phone; ?></td>
                                <td><?php echo $admin->email; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>