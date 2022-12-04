<?php require APPROOT . '/views/inc/header.php'; ?>

<!--?php flash('register_success'); ?-->

<div class="row">
        <div class="column">
            <table class="t1">
                <tr>
                    <th>Expectant mothers</th>
                    <th></th>
                    
                </tr>
                <tr>
                    <th>NIC</th>
                    <th>height</th>
                    <th>Weight</th>
                </tr>
                <?php foreach($data['nic'] as $display) : ?>
                    <tr>
                        <th><?php echo $display->nic; ?></th>
                        <th><?php echo $display->height; ?></th>
                        <th><?php echo $display->weight; ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>










<!--?php foreach($data['register'] as $reg): ?>
    <tr>
        <td><!-?php echo $reg->nic; ?></td>
        <td><!-?php echo $reg->bloodPressure; ?></td>
    </tr>
    <!-?php endforeach;?>
</table>


<?php require APPROOT . '/views/inc/footer.php'; ?>