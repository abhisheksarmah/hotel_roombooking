<?php
session_start();
$_SESSION["page"] = "hoteldetails.php";
include "connect.php";
$hid = $_GET["hid"];
$sql = "Select * from hotels where id='$hid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$hotel = $row[1];
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $hotel; ?></title>
  <link href="css/w3.css" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
  <link href="css/slide.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
    }

    * {
      box-sizing: border-box;
    }

    img {
      vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
      position: relative;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    .mySlides1 {
      display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
      cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 40%;
      width: auto;
      padding: 16px;
      margin-top: -10px;
      color: #F60;
      background-color: rgba(255, 255, 255, 0.7);
      font-weight: bold;
      font-size: 24px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #000;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
      text-shadow: 1px 1px #fff;
    }

    .typetext {
      color: #000;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
      right: 0;
      text-shadow: 1px 1px #fff;
    }

    /* Container for image text */
    .caption-container {
      text-align: center;
      background-color: #222;
      padding: 2px 16px;
      color: white;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Six columns side by side */
    .column {
      float: left;
      width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    /* .demo {
  /*opacity: 0.6;*/

    .active,
    .demo:hover {
      opacity: 1;
    }
  </style>
  <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="w3-display-container">
    <!--<img src="images/banner_bg.jpg" style="width:100%;">-->
    <div class="w3-display-topmiddle" style="width:100%;">
      <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off">
        <div class="w3-left" style="width:50%;">
          <a href="index.php"><img src="images/logo3.jpg" style="width:40%;"></a>
        </div>
        <div class="w3-right w3-right-align" style="padding-top:16px;">
          <?php
          if (isset($_SESSION["uname"])) {
            echo 'Welcome ' . $_SESSION["uname"];
            echo '&nbsp;&nbsp;<a href="logout.php" class="btn btn-outline-danger m-2"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>';
          } else {
          ?>
            <a onclick="document.getElementById('id01').style.display='block'" class="btn m-2 w3-right btn-outline-success w3-animate-right">Sign In</a>
            <a onclick="document.getElementById('id02').style.display='block'" class="btn m-2 w3-right btn-outline-info w3-animate-right">Sign Up</a>
          <?php
          }
          ?>
        </div>
      </div>

      <div class="w3-container w3-white w3-border w3-opacity-off w3-round-large" style="width:90%; margin:16px auto;">
        <h3 class=" text-center"><i class="fa fa-h-square" aria-hidden="true"></i> Hotel: <?php echo $hotel; ?></h3>
        <div class="w3-row-padding" style="padding-top:8px; padding-bottom:16px;">
          <div class="w3-third">
            <!-- <span class="w3-small text-center">Hotel Photos</span> -->
            <div class="container">
              <?php
              $str = "Select photo from photos where hid='$hid'";
              $rec = mysqli_query($con, $str);
              $n = mysqli_num_rows($rec);
              $i = 1;
              while ($r = mysqli_fetch_array($rec)) {
              ?>
                <div class="mySlides">
                  <h3 class="text-center"><strong>Hotel Photos</strong></h3>
                  <div class="numbertext mt-5"><?php echo $i . ' / ' . $n; ?></div>

                  <img src="<?php echo $r[0]; ?>" style="width:104%">
                </div>
              <?php
                $i++;
              }
              ?>
              <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
              <a class="next" onclick="plusSlides(1)"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="w3-third">
            <h3 class="text-center"><b>Room Photos</b></h3>
            <div class="w3-row-padding">
              <?php
              $str = "Select photo from rooms where hotelid='$hid' limit 4";
              $result = mysqli_query($con, $str);
              while ($row = mysqli_fetch_array($result)) {
                echo '<div class="w3-half" style="margin-bottom:16px;">
										<img src="' . $row[0] . '" style="width:100%; height:100px;">
									</div>';
              }
              ?>
            </div>
          </div>
          <div class="w3-third">
            <span class="w3-small" style="padding-left:16px;">&nbsp;</span>
            <div class="w3-container w3-round">
              <img src="images/best.jpg" style="width:100%;">
            </div>
          </div>
        </div>
        <h4 style="padding-left:16px;">Room Details</h4>
        <?php
        $str = "Select * from rooms where hotelid='$hid'";
        $result = mysqli_query($con, $str);
        while ($row = mysqli_fetch_array($result)) {
          echo '<div class="w3-row-padding w3-border w3-round w3-light-grey w3-card" style="margin-bottom:16px; margin-left:16px; margin-right:16px;">
                            <div class="w3-quarter w3-padding-12" style="margin-bottom:16px;">
                            	<strong>' . $row["roomtype"] . '</strong><br>
                            	<img src="' . $row["photo"] . '" class="w3-round w3-card" style="width:100%; height:150px;"><br><br>
								<span class="w3-small w3-text-indigo">Room Size: ' . $row["roomsize"] . '<br>
								Bed: ' . $row["bedtype"] . '</span>
                            </div>
							<div class="w3-quarter w3-padding-12" style="margin-bottom:16px;">
                            	<br>';
        ?>

        <?php
          $roomid = $row["roomid"];
          echo '</div>
						  <div class="w3-quarter w3-padding-12 w3-center" style="margin-bottom:16px;">
								<div class="w3-container w3-center w3-padding-24 w3-light-green w3-round-medium" style="margin-top:60px;">
								  <strong>Room Rate</strong><br><br>
								  <span class="w3-xlarge w3-text-indigo">Rs ' . $row["rate"] . '.00</span>
								</div>
						  </div>
						  <div class="w3-quarter w3-padding-12 w3-center" style="margin-bottom:16px;">
								<div class="w3-container w3-center" style="margin-top:110px;">
									<a href="booknow.php?hid=' . $hid . '&room=' . $roomid . '" class="w3-btn w3-round-large w3-medium w3-blue">Book This Room</a>
								</div>
						  </div>
                      </div>';
        }
        ?>


      </div>
    </div>

  </div>

  <!-- Login Modal -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top" style="width:350px;">
      <div class="w3-card-4 w3-lime w3-opacity-off">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-lime w3-medium">&times;</span>
        <div class="w3-container w3-center" style="padding-top:16px;">
          <img src="images/login.png" class="w3-white w3-circle w3-card" style="width:25%;" /><br>
          <span class="w3-large login"><strong>Login Here</strong></span>
        </div>
        <div class="w3-container w3-small">
          <form name="form1" id="form1" method="post" action="login.php">
            <p>
              <label>Username:</label>
              <input type="text" name="username" class="w3-input w3-border w3-border-black w3-round-medium w3-hover-border-blue ubg">
            </p>
            <p>
              <label>Password:</label>
              <input type="password" name="password" class="w3-input w3-border w3-border-black w3-round-medium w3-hover-border-blue pbg">
            </p>
            <p>
              <input type="submit" name="login" class="w3-btn w3-block w3-blue w3-round" value="Login">
            </p>
            <p align="right">
              New User? Click Here to Create an Account
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Signup Modal -->
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-top" style="width:400px;">
      <div class=" w3-card-4 w3-lime w3-opacity-min">
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <div class="w3-container w3-center" style="padding-top:16px;">
          <span class="w3-large login"><strong>User Registration</strong></span>
          <hr>
        </div>
        <div class="w3-container w3-small">
          <form name="form1" id="form1" method="post" action="registration.php">
            <p>
              <input type="text" name="mail" class="w3-input w3-border w3-round-medium" placeholder="E-Mail">
            </p>
            <p>
              <input type="password" name="password" class="w3-input w3-border w3-round-medium" placeholder="Password">
            </p>
            <p>
              <input type="password" name="password2" class="w3-input w3-border w3-round-medium" placeholder="Confirm Password">
            </p>
            <p>
              <input type="text" name="name" class="w3-input w3-border w3-round-medium" placeholder="Full Name">
            </p>
            <p>
              <textarea name="address" class="w3-input w3-border w3-round-medium" placeholder="Address"></textarea>
            </p>
            <p>
              <input type="text" name="contact" class="w3-input w3-border w3-round-medium" placeholder="Contact No.">
            </p>
            <p>
              <input type="submit" name="submit" class="w3-btn w3-block w3-red w3-round" value="Submit">
            </p>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
if (isset($_GET["save"])) {
  echo '<script> alert("Registration Completed"); </script>';
}
if (isset($_GET["log"])) {
  echo '<script> alert("You need to login to continue..."); </script>';
}
?>

<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function plusSlidess(n) {
    showSlides1(slideIndex += n);
  }


  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
  }

  function showSlides1(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides1");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
      slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
  }
</script>