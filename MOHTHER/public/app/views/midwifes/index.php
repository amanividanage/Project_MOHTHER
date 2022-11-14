<?php require APPROOT . '/views/inc/header.php'; ?>
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
                <div>
                    <a href="<?php echo URLROOT; ?>/midwifes/add"><button class="add">Add Midwife</button></a>
                </div>
            
                <div>
                    <table>
                        <tr>
                            <th>Midwife Details</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>Midwife Id</th>
                            <th>Clinic</th>
                            <th>PHM Area</th>
                            <th>Name</th>
                            <th>Identity No</th>
                            <th>Contact No</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        <?php foreach($data['midwifes'] as $midwife) : ?>
                            <tr>
                                <td><?php echo $midwife->midwife_id; ?></td>
                                <td><?php echo $midwife->clinic; ?></td>
                                <td><?php echo $midwife->phm; ?></td>
                                <td><?php echo $midwife->name; ?></td>
                                <td><?php echo $midwife->identity; ?></td>
                                <td><?php echo $midwife->phone; ?></td>
                                <td><?php echo $midwife->email; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>