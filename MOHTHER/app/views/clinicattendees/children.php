<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>

    <div class="content">

        <h1 class="content_h1">Children Overview</h1>

        <div class="row">
            <div class="dashboard_CH">
                <h4>Children <hr></h4> <br>

                <table>
                    <thead>
                        <tr>
                            <th>Register number</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['children'] as $children) : ?>
                            <tr>
                                <td><?php echo $children->child_id; ?></td>
                                <td><?php echo $children->name; ?></td>

                                <td colspan=2> <a href="<?php echo URLROOT; ?>/clinicattendees/child/<?php echo $children->child_id; ?>"><button class="go_btn">Go</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br>

            </div>

        </div>

        

    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>




        




        

        




        







    