<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_clinicattendee.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title><?php echo SITENAME; ?></title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        } */

        .content h1 {
            font-size: 40px;
            color: #ff4d4d;
            margin-bottom: 50px;
            padding top: 50px;
        }
        .error-message {
      font-size: 36px;
      font-weight: bold;
      color: #ff0000;
      margin-top: 200px;
      margin-right: 40px;
    }

      .redirect{
        color: #8946A6
      }
    

      
    </style>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <!-- <!?php require APPROOT . '/views/inc/sidebar_clinicattendee.php'; ?>  -->
    <div class="content">
    <div class="error-message">
    <h3>Sorry, you can only book one time slot!</h3>

    
  </div>
  <a href="<?php echo URLROOT; ?>"><h3 class="redirect">Redirect to the initial page>> </h3></a>

     
</script>


    
   
</body>
</html>
