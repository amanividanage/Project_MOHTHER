
<input type="checkbox" id="check">
<nav>
    <label for="check">
        <i class="fa fa-bars" aria-hidden="true" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <img src="<?php echo URLROOT;?>/img/2.png" alt="">

    </div>
    
    
    <ul>
        <?php if(isset($_SESSION['admin_id'])) : ?>
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
                <a href="<?php echo URLROOT; ?>/users/register">REGISTER</a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/admins/login">LOGIN</a>
            </li>
        <?php endif; ?>
    </ul>
    
</nav>