<!--Side bar Start-->
<?php if(isset($_SESSION['midwife_nic'])) : ?>
    <!--Side bar Start-->
    <div class="sidebar">
        <div class="sidebar_menu">
            <center>
                <img src="<?php echo URLROOT;?>/img/3.png" class="profile_image" alt="">
                <h4><?php echo $_SESSION['midwife_name']; ?></h4>
            </center>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/expectantRecords/dashboard" class="menu-btn">
                    <i class="fa fa-th"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/expectantRecords" class="menu-btn">
                    <i class="fa fa-user-plus"></i><span>New Registrants</span>
                </a>
            </li>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/expectantRecords/midwife_profile"" class="menu-btn">
                    <i class="fa fa-home"></i><span>My Profile</span>
                </a>
            </li>

            <li class="item" id="clinic-attendee">
                <a href="#clinic-attendee" class="menu-btn">
                    <i class="fa fa-users"></i><span>Clinic Attendee <i class="fa fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="<?php echo URLROOT; ?>/expectantRecords/expectnatmotherlist"><i class="fa fa-female"></i><span>Expectant Mother</span></a>
                    <a href="<?php echo URLROOT; ?>/childrens/parentlist"><i class="fa fa-user-circle-o"></i><span>Parent/Guardian</span></a>
                    <a href="<?php echo URLROOT; ?>/expectantRecords/deliveredList"><i class="fa fa-user-circle-o"></i><span>Delivered Mothers</span></a>
                </div>
            </li>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/childrens" class="menu-btn">
                    <i class="fa fa-child"></i><span>Children</span>
                </a>
            </li>

            <li class="item" id="clinic-calendar">
                <a href="#clinic-calendar" class="menu-btn">
                    <i class="fa fa-calendar"></i><span>Clinic Calendar <i class="fa fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="<?php echo URLROOT; ?>/calendars/maternitycalendar"><i class="fa fa-calendar-plus-o"></i><span>Maternity Clinic</span></a>
                    <a href="<?php echo URLROOT; ?>/calendars/build_calendar"><i class="fa fa-calendar-check-o"></i><span>Child Clinic</span></a>
                </div>
            </li>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/expectantRecords/statics" class="menu-btn">
                    <i class="fa fa-sliders"></i><span>Statistics</span>
                </a>
            </li>
        </div>
    </div>
    <!--Side bar End-->

<?php else : ?>
    
<?php endif; ?>
    <!--Side bar End-->