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
                    <h2 class="content_h1">Parent List</h2>
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
                </div>
            </div>
            <hr class="line">

            <div>
                <table>
                    <tr>
                        <th>Parent/Guardian Details</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>NIC No</th>
                        <th>Relationship to the child</th>
                        <th>Name</th>
                        <th>Occupation</th>
                        <th>Contact No</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                    <?php foreach($data['parents'] as $parent) : ?>
                        <tr>
                            <td><a href="<?php echo URLROOT; ?>/childrens/parentprofile/<?php echo $parent->nic; ?>"><?php echo $parent->nic; ?></a></td>
                            <td><?php echo $parent->relationship; ?></td>
                            <td><?php echo $parent->name; ?></td>
                            <td><?php echo $parent->occupation; ?></td>
                            <td><?php echo $parent->contactno; ?></td>
                            <td><?php echo $parent->email; ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>