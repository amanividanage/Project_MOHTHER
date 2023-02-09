
<input type="checkbox" id="check">
<nav>
    <label for="check">
        <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <img src="<?php echo URLROOT;?>/img/2.png" alt="">

    </div>
    
    
    <ul>
        <?php if((isset($_SESSION['admin_nic'])) || (isset($_SESSION['clinicattendee_nic'])) || (isset($_SESSION['midwife_id']))) : ?>
            
    <!--if((isset($_SESSION['admin_id'])) || (isset($_SESSION['clinicattendee_id'])))-->
            <li>
                <a class="active" href="<?php echo URLROOT; ?>/admins/logout">LOGOUT</a>
            </li>
        <?php else : ?>
            <li>
                <a class="active" href="<?php echo URLROOT; ?>">HOME</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/contact" class="bctive">CONTACT US</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/facilities" class="bctive" >FACILITIES</a> 
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/pages/about" class="bctive">ABOUT US</a> 
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/clinicattendees/register" class="bctive">REGISTER</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/users/login" class="bctive">LOGIN</a>
            </li>
        <?php endif; ?>
    </ul>
    
</nav>