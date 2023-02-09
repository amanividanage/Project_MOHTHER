<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_midwife.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!--  <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <?php require APPROOT . '/views/inc/navbar.php' ; ?>
    <?php require APPROOT . '/views/inc/sidebar_midwife.php' ; ?>
    
   <!-- ?php echo $data['reportNo_err']; ?-->

    <div class= "content">
        <?php
    // Create the calendar table
  echo "<table border='1'>";
  echo "<tr><th colspan='7'>".date("F Y", $data['firstDay'])."</th></tr>";
  echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";
  
  // Create the first row with empty cells for the days that come before the first day of the month
  echo "<tr>";
  for ($i = 0; $i < $data['firstDayOfWeek']; $i++) {
    echo "<td></td>";
  }
  
  // Fill in the rest of the cells with the dates for the month
  $day = 1;
  for ($i = $data['firstDayOfWeek']; $i < 7; $i++) {
    echo "<td>$day</td>";
    $day++;
  }
  echo "</tr>";
  
  // Create the rest of the rows for the rest of the days in the month
  while ($day <= $data['numDays'];) {
    echo "<tr>";
    for ($i = 0; $i < 7 && $day <= $data['numDays']; $i++) {
      echo "<td>$day</td>";
      $day++;
    }
    echo "</tr>";
  }
  
  echo "</table>";



$month = 2;
$year = 2023;
build_calendar($month, $year);
?>
