<?php require APPROOT . '/views/inc/header.php'; ?>
    <div>
        <div>
            <h2 class="content_h1">Doctors</h2>
            <hr class="line">
        </div>
        <div>
            <a href="<?php echo URLROOT; ?>/doctors/add"><button class="add">Add Doctor</button></a>
        </div>
    
        <div>
            <table>
                <tr>
                    <th>Doctor Details</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Doctor Id</th>
                    <th>Name</th>
                    <th>Identity No</th>
                    <th>Contact No</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
                <?php foreach($data['doctors'] as $doctor) : ?>
                    <tr>
                        <td><?php echo $doctor->doctor_id; ?></td>
                        <td><?php echo $doctor->name; ?></td>
                        <td><?php echo $doctor->identity; ?></td>
                        <td><?php echo $doctor->phone; ?></td>
                        <td><?php echo $doctor->email; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>