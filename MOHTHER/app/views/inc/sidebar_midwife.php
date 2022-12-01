<!--Side bar Start-->
<?php if(isset($_SESSION['midwife_id'])) : ?>
    <!--Side bar Start-->
    <div class="sidebar">
        <div class="sidebar_menu">
            <center>
                <img src="<?php echo URLROOT;?>/img/3.png" class="profile_image" alt="">
                <h4>Joe Teddy</h4>
            </center>
    
            <li class="item">
                <a href="#" class="menu-btn">
                    <i class="fa fa-th"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="item">
                <a href="#" class="menu-btn">
                    <i class="fa fa-home"></i><span>Clinics</span>
                </a>
            </li>

            <li class="item" id="clinic-attendee">
                <a href="#clinic-attendee" class="menu-btn">
                    <i class="fa fa-users"></i><span>Clinic Attendee <i class="fa fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href=""><i class="fa fa-female"></i><span>Expectant Mother</span></a>
                    <a href=""><i class="fa fa-user-circle-o"></i><span>Parent/Guardian</span></a>
                </div>
            </li>

            <li class="item">
                <a href="<?php echo URLROOT; ?>/children" class="menu-btn">
                    <i class="fa fa-child"></i><span>Children</span>
                </a>
            </li>

            <li class="item" id="clinic-calendar">
                <a href="#clinic-calendar" class="menu-btn">
                    <i class="fa fa-calendar"></i><span>Clinic Calendar <i class="fa fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href=""><i class="fa fa-calendar-plus-o"></i><span>Maternity Clinic</span></a>
                    <a href=""><i class="fa fa-calendar-check-o"></i><span>Child Clinic</span></a>
                </div>
            </li>

            <li class="item">
                <a href="#" class="menu-btn">
                    <i class="fa fa-sliders"></i><span>Statistics</span>
                </a>
            </li>
        </div>
    </div>
    <!--Side bar End-->

<?php else : ?>
    
<?php endif; ?>
    <!--Side bar End-->