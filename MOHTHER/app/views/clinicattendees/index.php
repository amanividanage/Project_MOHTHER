<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<!?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><!?php echo SITENAME; ?></title>
</head>
<body>
    <!?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <!?php require APPROOT . '/views/inc/sidebar_clinicattendee.php' ; ?>
        <div class="content">
            

        <h1 class="content_h1">Welcome, <!?php if(isset($_SESSION['clinicattendee_id'])){
            echo explode(" ", $_SESSION['clinicattendee_name'])[0];
            } else {
                echo 'Guest';
            }
        ?>
        </h1>
    
<!?php require APPROOT . '/views/inc/footer.php'; ?> -->





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

        <h1 class="content_h1">Welcome, <?php if(isset($_SESSION['clinicattendee_id'])){
            echo explode(" ", $_SESSION['clinicattendee_name'])[0];
            } else {
                echo 'Guest';
            }
        ?>
        </h1>

        <div class="bg_index">

            <h2>Overview</h2>

            <div class="row_CA">

                <div class="dashboard_CA">
                    <h4>Next Clinic Date</h4> <br>
                    <div class="">
                        Monthly Clinic

                        <br><br>
                        Date: 2022/05/03

                        <br>
                        <div>
                            <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_mothlyclinic"><button
                                    class="reserve_btn">Reserve</button></a>
                        </div>
                    </div>

                    <br> <br>

                    <div class="">
                        Next vaccination

                        <br><br>
                        Date: 2022/05/03

                        <br>
                        <div>
                            <a href="<?php echo URLROOT; ?>/clinicattendees/timeslot_vaccination"><button
                                    class="reserve_btn">Reserve</button></a>
                        </div>
                    </div>
                </div>


                <div class="dashboard_CA">
                    <h4>Children</h4>
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

                                <td colspan=2> <a
                                        href="</?php echo URLROOT; ?>/clinicattendees/particular_child"><button
                                            class="go_btn">Go</button></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                    <br>
                    <br>
                    




                </div>

            </div>




            <div class="">

                <div class="welcomebox">

                </div>
                <br> <br>



                <h3>Monthly Reports </h3>
                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Report number</th>
                            <th>Date</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['report1'] as $repo) : ?>
                        <tr>
                            <td><?php echo $repo->reportNo; ?></td>
                            <td><?php echo $repo->date; ?></td>
                            <td><?php echo $repo->weight; ?></td>


                            <td colspan=2><a href="<?php echo URLROOT; ?>/clinicattendees/report"><button
                                        class="more_btn"><b>More</b></button></a></td>



                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>





            </div>

        </div>

    </div>
        <?php require APPROOT . '/views/inc/footer.php'; ?>