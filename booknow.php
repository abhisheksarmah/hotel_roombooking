<?php
session_start();
include "connect.php";
$hid = $_GET["hid"];
if (!isset($_SESSION["uname"])) {
    header("location:hoteldetails.php?log=0&hid=" . $hid);
    return;
}

$sql = "Select * from hotels where id='$hid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$hotel = $row[1];
$address = $row[4];
$city = $row[3];


$email = $_SESSION["uname"];
$sql1 = "Select * from customer where email='$email'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);
$customer = $row1[2];
$contact = $row1[4];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
        }
    </style>
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
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
                        echo '&nbsp;&nbsp;<a href="logout.php" class="w3-right btn btn-outline-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>    Logout</a>';
                    } else {
                    ?>
                        <a onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Sign In</a>&nbsp;&nbsp;
                        <a onclick="document.getElementById('id02').style.display='block'" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Sign Up</a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="w3-container w3-white w3-border w3-opacity-off w3-round-large" style="width:90%; margin:16px auto;">
                <span class="w3-tiny w3-text-blue" style="padding-left:16px;">Home ->Hotels ->Booking -><?php echo $hotel; ?></span>
                <div class="w3-row-padding" style="padding-top:8px; padding-bottom:16px;">
                    <div class="w3-twothird">
                        <div class="w3-container">
                            <?php
                            $str = "Select photo from photos where hid='$hid' limit 1";
                            $rec = mysqli_query($con, $str);
                            $n = mysqli_num_rows($rec);
                            $r = mysqli_fetch_array($rec);
                            ?>
                            <div class="w3-left" style="width:280px;">
                                <img src="<?php echo $r[0]; ?>" style="width:100%; height:180px;" class="w3-round w3-card">
                            </div>
                            <div class="w3-left" style="margin-left:16px;">
                                <span class="w3-large"><strong><?php echo $hotel; ?></strong></span><br>
                                <?php echo $address; ?><br>
                                <?php echo $city; ?><br><br>
                                Checkin: <?php echo $_SESSION["cin"]; ?><br>Checkout: <?php echo $_SESSION["cout"]; ?><br>
                                No. of Rooms: <?php echo $_SESSION["nor"]; ?>
                            </div>
                        </div>
                        <?php
                        $rr = $_SESSION["nor"];
                        $cind = $_SESSION["cin"];
                        $coutd = $_SESSION["cout"];
                        $roomid = $_GET["room"];
                        $str = "Select * from rooms where roomid='$roomid'";
                        $result = mysqli_query($con, $str);
                        $row = mysqli_fetch_array($result);
                        $photo = $row["photo"];
                        $roomtype = $row["roomtype"];
                        $rate = $row["rate"];
                        $nor = $row["nor"];

                        $str = "Select count(*) from booked where roomid='$roomid' and date='$cind'";
                        $result = mysqli_query($con, $str);
                        $row = mysqli_fetch_array($result);
                        $rb = $row[0];
                        $ra = $nor - $rb;

                        if ($rr > $ra) {
                            header("location:index.php?room=0");
                            return;
                        }

                        $amount = $rate * $rr;
                        $date1 = date_create($cind);
                        $date2 = date_create($coutd);
                        $diff = date_diff($date1, $date2);
                        $days = intval($diff->format("%a"));
                        $netamount = $days * $amount;
                        ?>
                        <div class="w3-container w3-padding-16">
                            <h4 class="text-center">Traveller Information <i class="fa fa-info" aria-hidden="true"></i> </h4>
                            <form method="post" action="postbooking.php">
                                <input type="hidden" name="hotelid" value="<?php echo $hid; ?>">
                                <input type="hidden" name="roomid" value="<?php echo $roomid; ?>">
                                <p>
                                    <label>Traveller Name <i class="fa fa-suitcase" aria-hidden="true"></i></label>
                                    <input type="text" name="name" class="w3-input w3-border" value="<?php echo $customer; ?>">
                                </p>
                                <p>
                                    <label>E-Mail ID <i class="fa fa-envelope" aria-hidden="true"></i></label>
                                    <input type="text" name="email" class="w3-input w3-border" value="<?php echo $email; ?>">
                                </p>
                                <p>
                                    <label>Contact Number <i class="fa fa-phone-square" aria-hidden="true"></i></label>
                                    <input type="text" name="contact" class="w3-input w3-border" value="<?php echo $contact; ?>">
                                </p>
                                <p>
                                    <label>Check In Date <i class="fa fa-calendar" aria-hidden="true"></i></label>
                                    <input type="date" name="cindate" class="w3-input w3-border" value="<?php echo $_SESSION["cin"]; ?>" readonly>
                                </p>
                                <p>
                                    <label>Check Out Date <i class="fa fa-calendar" aria-hidden="true"></i></label>
                                    <input type="date" name="coutdate" class="w3-input w3-border" value="<?php echo $_SESSION["cout"]; ?>" readonly>
                                </p>
                                <p>
                                    <label>Room Type <i class="fa fa-bed" aria-hidden="true"></i></label>
                                    <input type="text" name="roomtype" class="w3-input w3-border" value="<?php echo $roomtype; ?>" readonly>
                                </p>
                                <p>
                                    <label>No. of Rooms <i class="fa fa-bed" aria-hidden="true"></i></label>
                                    <input type="text" name="norooms" class="w3-input w3-border" value="<?php echo $_SESSION["nor"]; ?>" readonly>
                                </p>
                                <p>
                                    <label>Amount <i class="fa fa-money" aria-hidden="true"></i></label>
                                    <input type="text" name="amount" class="w3-input w3-border" value="<?php echo $netamount; ?>" readonly>
                                </p>
                                <p>
                                    <input type="submit" name="submit" value="Confirm Booking" class="w3-btn w3-block w3-round w3-red">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="w3-third w3-border w3-round-medium">
                        <span class="w3-small" style="padding-left:24px;">Room Selected</span>
                        <div class="w3-row-padding">
                            <?php {
                                echo '<div class="w3-container" style="margin-bottom:4px;">
										<img src="' . $photo . '" style="width:100%; height:120px;">
										<h5 class="w3-text-blue mt-3">' . $roomtype . '&nbsp;|&nbsp; Rs. ' . $rate . ' / Room
										</h5>
									</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--<div class="w3-container w3-padding-12 w3-right-align">
          Copyright ©2019 All rights reserved
      </div>-->
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
if (isset($_GET["user"])) {
    echo '<script> alert("This E-mail is already registered"); </script>';
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