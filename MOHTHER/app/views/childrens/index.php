<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife_children.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
        <div class="content">
            <div class="search_add-main">
                <div>
                    <h2 class="content_h1">Children List</h2>
                </div>
                <div class="search_add">
                    <form action="" method="GET">
                        <div class="search">
                            <input type="search" name="search" placeholder="Search here...">
                            <!--button type="submit" class="search_icon"><i class="fa fa-search"></i></button-->
                        </div>
                    </form>
                    <div>
                        <button id="myBtn" class="add">Add Children</button>
                    </div>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h4>Is mother/parent already registered?</h4> 
                            <a href="<?php echo URLROOT; ?>/children"><button class="curve_btn">Yes</button></a>
                            <a href="<?php echo URLROOT; ?>/childrens/parent"><button class="curve_btn">No</button></a>
                        </div>

                    </div>
                </div>
            </div>
            <hr class="line">
        
        </div>

        <script src="<?php echo URLROOT ; ?>/js/midwife_children.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>