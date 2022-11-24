<!--Side bar Start-->
<?php if(isset($_SESSION['midwife_id'])) : ?>
    <div class="sidebar">
        <center>
                <img src="1.png" class="profile_image" alt="">
                <h4>Joe Teddy</h4>
        </center>
            <a href="<?php echo URLROOT; ?>/clinicattendees"><i class="fa fa-th" aria-hidden="true"></i><span>Dashboard</span></a>
            <a href="<?php echo URLROOT; ?>/clinicattendees/profile"><i class="fa fa-user" aria-hidden="true"></i><span>Profile</span></a>
            <a href="<?php echo URLROOT; ?>/clinicattendees/home"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
            <a href="<?php echo URLROOT; ?>/clinicattendees/children"><i class="fa fa-user-md" aria-hidden="true"></i><span>Children</span></a>
            <a href="<?php echo URLROOT; ?>/clinicattendees/calendar"><i class="fa fa-heart" aria-hidden="true"></i><span>Clinic Calendar</span></a>
            <a href="<?php echo URLROOT; ?>/Statistics"><i class="fa fa-sliders" aria-hidden="true"></i><span>Statistics</span></a>
    </div>

<?php else : ?>
    
<?php endif; ?>
    <!--Side bar End-->