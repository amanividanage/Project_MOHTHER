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
            <br>
            <div class="report">
                <h2 class="content_h1">Parent profile - <?php echo $data['parents']->name; ?></h2>
                <a href="<?php echo URLROOT; ?>/childrens/add/<?php echo $data['parents']->nic; ?>"><button class="add">Add Child</button></a> 
            </div>
            

            <div class="mine">
                <div class="card1">
                    <div class="container">
                        <table>
                        <tr>
                            <th>Basic Info</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $data['parents']->name; ?></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><?php echo $data['parents']->age; ?></td>
                        </tr>
                        <tr>
                            <td>NIC No </td>
                            <td><?php echo $data['parents']->nic; ?></td>
                        </tr>
                        <tr>
                            <td>Relationship</td>
                            <td><?php echo $data['parents']->relationship; ?> </td>
                        </tr>
                        <tr>
                            <td>Level of Education</td>
                            <td><?php echo $data['parents']->levelofeducation; ?></td>
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td><?php echo $data['parents']->occupation; ?></td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td><?php echo $data['parents']->contactno; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $data['parents']->address; ?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><?php echo $data['parents']->email; ?></td>
                        </tr>
                        </table> 
                    </div>
                </div>

                <div class="card">
                        <div class="container">
                            <table>
                                <tr>
                                    <th colspan=3>Children</th>
                                </tr>
                                <?php foreach($data['children'] as $children) : ?>
                                    <tr>
                                        <td><a href="<?php echo URLROOT; ?>/childrens/childprofile/<?php echo $children->child_id; ?>"><?php echo $children->child_id; ?></a></td>
                                        <td><?php echo $children->name; ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                </div>
            </div>
        </div>

        
<?php require APPROOT . '/views/inc/footer.php'; ?>