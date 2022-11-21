
<input type="checkbox" id="check">
<nav>
    <label for="check">
        <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <img src="<?php echo URLROOT;?>/img/2.png" alt="">

    </div>
    
    
    <ul>
        <?php if((isset($_SESSION['admin_id'])) || (isset($_SESSION['clinicattendee_id'])) || (isset($_SESSION['midwife_id']))) : ?>
            
    <!--if((isset($_SESSION['admin_id'])) || (isset($_SESSION['clinicattendee_id'])))-->
            <li>
                <a class="active" href="<?php echo URLROOT; ?>/admins/logout">LOGOUT</a>
            </li>
        <?php else : ?>
            <li>
                <a class="active" href="<?php echo URLROOT; ?>">HOME</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/contact" >CONTACT US</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/facilities" >FACILITIES</a> 
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/about">ABOUT US</a> 
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/clinicattendees/register">REGISTER</a>
            </li>
            <li class="dropdown-login">
                <a href="">LOGIN</a>
                <div class="dropdown-content-login">
                    <a href="<?php echo URLROOT; ?>/admins/login">Admin</a>
                    <a href="<?php echo URLROOT; ?>/midwifes/login">Midwife</a>
                    <a href="<?php echo URLROOT; ?>/doctors/login">Doctor</a>
                    <a href="<?php echo URLROOT; ?>/clinicattendees/login">User</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
    
</nav>