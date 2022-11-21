<?php require APPROOT . '/views/inc/header.php'; ?>
    <div>
        <div>
            <h1 class="content_h1">Clinics</h1>
        </div>
        <div>
            <a href="<?php echo URLROOT; ?>/clinics/add"><button class="add">Add Clinic</button></a>
        </div>
    </div>
    <?php foreach($data['clinics'] as $clinic) : ?>
        <div class="big">
            <div class="card">
                <div class="container">
                    <h4><a href="<?php echo URLROOT; ?>/clinics/info/<?php echo $clinic->id; ?>"><b><?php echo $clinic->clinic_name; ?></b></a></h4>
                </div>
            </div>
        </div>
        
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>