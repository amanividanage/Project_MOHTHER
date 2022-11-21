<!--Side bar Start-->
<?php if(isset($_SESSION['admin_id'])) : ?>
    <div class="sidebar">
        <center>
                <img src="1.png" class="profile_image" alt="">
                <h4>Joe Teddy</h4>
        </center>
            <a href="<?php echo URLROOT; ?>"><i class="fa fa-th" aria-hidden="true"></i><span>Dashboard</span></a>
            <a href="<?php echo URLROOT; ?>/admins"><i class="fa fa-user" aria-hidden="true"></i><span>Admins</span></a>
            <a href="<?php echo URLROOT; ?>/clinics"><i class="fa fa-home" aria-hidden="true"></i><span>Clinics</span></a>
            <a href="<?php echo URLROOT; ?>/doctors"><i class="fa fa-user-md" aria-hidden="true"></i><span>Doctors</span></a>
            <a href="<?php echo URLROOT; ?>/midwifes"><i class="fa fa-heart" aria-hidden="true"></i><span>Midwives</span></a>
            <a href="<?php echo URLROOT; ?>/Statistics"><i class="fa fa-sliders" aria-hidden="true"></i><span>Statistics</span></a>
    </div>

<?php else : ?>
    
<?php endif; ?>
    <!--Side bar End-->