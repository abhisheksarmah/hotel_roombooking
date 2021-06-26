<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("location:index.php?log=0");
  return;
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link href="css/calender.css" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
  <link href="css/w3.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <style type="text/css">
    .bbg {
      background-image: url("images/admin-dashboard.png");
      background-size: auto;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>


  <div class="w3-container w3-black" style="padding-top:8px; padding-bottom:8px;">
    <div class="w3-left" style="width:200px;">
      <img src="images/logo3.jpg" class="w3-animate-left" style="width:200px;">
    </div>
    <div class="w3-center" style="padding-top:8px;">
      <b class="w3-large">Welcome Admin </b> &nbsp;&nbsp;&nbsp;
      <a href="logout.php" class="btn btn-outline-danger w3-right"><i class="fa fa-power-off"></i> Logout</a>
    </div>
  </div>
  <?php include "adminMenu.php"; ?>
  <div class="bbg" style="height:550px; margin-top:48px;">
    <h3 align="center">ADMIN DASHBOARD</h3>
  </div>
</body>

</html>