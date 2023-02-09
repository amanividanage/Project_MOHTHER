<!--Side bar Start-->
<?php if(isset($_SESSION['admin_nic'])) : ?>
    <div class="sidebar">
        <center>
                <img src="<?php echo URLROOT;?>/img/user.png" class="profile_image" alt="">
                <h4><?php echo $_SESSION['admin_name']; ?></h4>
        </center>
            <a href="<?php echo URLROOT; ?>/admins/dashboard"><i class="fa fa-th" aria-hidden="true"></i><span>Dashboard</span></a>
            <a href="<?php echo URLROOT; ?>/admins"><i class="fa fa-user" aria-hidden="true"></i><span>Admins</span></a>
            <a href="<?php echo URLROOT; ?>/clinics"><i class="fa fa-home" aria-hidden="true"></i><span>Clinics</span></a>
            <a href="<?php echo URLROOT; ?>/doctors"><i class="fa fa-user-md" aria-hidden="true"></i><span>Doctors</span></a>
            <a href="<?php echo URLROOT; ?>/midwifes"><i class="fa fa-heart" aria-hidden="true"></i><span>Midwives</span></a>
            <a href="<?php echo URLROOT; ?>/admins/statistics"><i class="fa fa-sliders" aria-hidden="true"></i><span>Statistics</span></a>
    </div>

<?php else : ?>
    
<?php endif; ?>
    <!--Side bar End-->