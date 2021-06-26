<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Add Hotels</title>
  <link href="css/calender.css" type="text/css" rel="stylesheet">
  <link href="css/w3.css" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <style type="text/css">
    body {
      font-family: 'Montserrat', sans-serif;
    }

    label.error {
      color: #F00;
      font-size: x-small;
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
  <div class="w3-container w3-black w3-round-medium p-4 w3-opacity-min" style="width:50%; margin:48px auto;">
    <h3 align="center">ADD NEW HOTEL</h3>
    <div class="w3-container" style="padding-bottom:16px;">
      <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="savehotel.php">
        <p>
          <input type="text" name="name" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="Hotel Name" required>
        </p>
        <p>
          <input type="number" name="star" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="Hotel Star" required>
        </p>
        <p>
          <input type="text" name="city" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="City" required>
        </p>
        <p>
          <textarea name="address" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="Hotel Address" required></textarea>
        </p>
        <p>
          <input type="text" name="contact" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="Hotel Contact No." required>
        </p>
        <p>
          <input type="text" name="mail" class="w3-input w3-border w3-round-medium w3-hover-border-blue" placeholder="Hotel E-mail ID" required>
        </p>
        <p align="right">
          <input type="submit" name="submit" class=" btn btn-outline-danger w3-right" value="Submit Record">
        </p>
      </form>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_GET["ok"])) {
  echo '<script> alert("Hotel Added!!"); </script>';
}
?>