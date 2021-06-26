<?php
session_start();
$_SESSION["page"] = "search.php";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Assam Hotels</title>
    <link href="css/w3.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
    <link href="css/slide.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url(images/background1.jpg);
            background-repeat: no-repeat;
        }

        label.error {
            color: #F00;
            font-size: x-small;
        }

        .tbg {
            background-image: url(images/calendar.png);
            background-position: left;
            background-repeat: no-repeat;
            padding-left: 40px;
        }

        .ubg {
            background-image: url(images/user-small.jpg);
            background-position: left;
            background-repeat: no-repeat;
            padding-left: 45px;
        }

        .pbg {
            background-image: url(images/lock.jpg);
            background-position: left;
            background-repeat: no-repeat;
            padding-left: 45px;
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
        <div class="w3-display-topmiddle" style="width:100%;">
            <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off">
                <div class="w3-left" style="width:50%;">
                    <a href="index.php"><img src="images/logo3.jpg" style="width:40%;"></a>
                </div>
                <div class="w3-center w3-right-align" style="padding-top:16px;">
                    <?php
                    if (isset($_SESSION["uname"])) {
                        echo '<h4><i class="fa fa-handshake-o" aria-hidden="true"></i>  Welcome </h4>' . $_SESSION["uname"];
                        echo '&nbsp;&nbsp;<a href="logout.php" class="btn btn-outline-danger w3-right"><i class="fa fa-sign-out" aria-hidden="true"></i>    Logout</a>';
                    } else {
                    ?>
                        <a onclick="document.getElementById('id01').style.display='block'" class="btn m-2 w3-right btn-outline-success w3-animate-right">Sign In</a>
                        <a onclick="document.getElementById('id02').style.display='block'" class="btn m-2 w3-right btn-outline-info w3-animate-right">Sign Up</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            include "connect.php";
            if (!isset($_POST["submit"])) {
                header("location:index.php");
                return;
            } else {
                $city = $_POST["city"];
                $nog = $_POST["nog"];
                $date1 = mysqli_real_escape_string($con, $_POST["cindate"]);
                $cindate = date("Y-m-d", strtotime($date1));
                $date2 = mysqli_real_escape_string($con, $_POST["coutdate"]);
                $coutdate = date("Y-m-d", strtotime($date2));
                $nor = $_POST["nor"];
                $_SESSION["cin"] = $cindate;
                $_SESSION["cout"] = $coutdate;
                $_SESSION["nor"] = $nor;
            }
            ?>
            <form name="form1" id="form1" method="post" action="search.php">
                <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off w3-center w3-round-medium mt-5" style="width:90%; margin:20px auto;">

                    <div class="w3-container">
                        <div class="w3-left" style="width:20%; margin-left:10px;">
                            <label>Enter City</label>
                            <input type="text" id="city" name="city" class="w3-input w3-border" value="<?php echo $city; ?>">
                        </div>
                        <div class="w3-left" style="width:18%; margin-left:10px;">
                            <label>Check-in Date</label>
                            <input type="text" id="Datepicker1" name="cindate" class="w3-input w3-border tbg" value="<?php echo $cindate; ?>">
                        </div>
                        <div class="w3-left" style="width:18%; margin-left:10px;">
                            <label>Check-out Date</label>
                            <input type="text" id="Datepicker2" name="coutdate" class="w3-input w3-border tbg" value="<?php echo $coutdate; ?>">
                        </div>
                        <div class="w3-left" style="width:10%; margin-left:10px;">
                            <label>No. of Rooms</label>
                            <input type="number" id="nor" name="nor" min="1" max="8" class="w3-input w3-border" value="<?php echo $nor; ?>">
                        </div>
                        <div class="w3-left" style="width:10%; margin-left:10px;">
                            <label>No. of Guest</label>
                            <input type="number" id="nog" name="nog" min="1" max="16" class="w3-input w3-border" value="<?php echo $nog; ?>">
                        </div>
                        <div class="w3-left" style="width:15%; margin-left:10px; padding-top:24px;">
                            <button type="submit" name="submit" value="Search" class="btn btn-outline-success w3-round-large">Search <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>

                </div>
                <?php
                /*$types=array();
			$hotels=array();
			$str="Select * from booked where date='$cindate'";
			$result=mysqli_query($con,$str);
			$i=0;
			while($row=mysqli_fetch_array($result))
			{
				$types[$i]=$row["roomtype"];
				$hotels[$i]=$row["hotelid"];
				$i++;
			}*/
                if (isset($_POST["star"])) {
                    $star = $_POST["star"];
                    $sql = "Select * from hotels where city='$city' and star='$star'";
                } else {
                    $sql = "Select * from hotels where city='$city'";
                }
                $result = mysqli_query($con, $sql);
                ?>
                <div class="w3-container bg-light w3-border w3-padding-16 w3-opacity-off w3-round-large" style="width:90%; margin:16px auto;">
                    <div class="w3-row-padding">

                        <div class="w3-threequarter">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $hid = $row[0];
                                $str = "Select photo from photos where hid='$hid' limit 1";
                                $rec = mysqli_query($con, $str);
                                $r = mysqli_fetch_array($rec)
                            ?>
                                <div class="w3-container w3-border w3-round w3-padding-12" style="margin-bottom:12px; display:flex;">
                                    <div class="w3-left w3-center" style="width:30%; margin-right:16px;">
                                        <a href="hoteldetails.php?hid=<?php echo $hid; ?>"><img src="<?php echo $r["photo"]; ?>" style="width:100%; height:140px;" class="w3-card"></a><br>
                                    </div>
                                    <div class="w3-left" style="width:35%; margin-right:12px;">
                                        <span class="w3-large">
                                            <strong>
                                                <a href="hoteldetails.php?hid=<?php echo $hid; ?>" style="text-decoration:none;"><?php echo $row["name"]; ?></a>
                                            </strong>
                                        </span><br>
                                        <img src="<?php echo 'images/' . $row["star"] . 'star.jpg'; ?>" style="width:25%;"><br><br>

                                    </div>
                                    <div class="w3-left w3-center" style="width:20%; margin-right:8px; padding-top:12px;">
                                        <?php
                                        /*$str1="Select * from ratings where hotelid='$hid'";
								$rec1=mysqli_query($con,$str1);
								$n=mysqli_num_rows($rec1);
								$total=0;
								$rating=0.0;
								if($n>0)
								{
									while($r1=mysqli_fetch_array($rec1))
									{
										$total=$total+$r1[2];	
									}
									$rating=$total/$n;
									$rating=round($rating,2);
								}*/
                                        ?>
                                        <!--<span class="w3-red w3-circle w3-padding w3-small" style="margin-bottom:8px;"><?php //echo $rating; 
                                                                                                                            ?>/5</span><br>
                            <div class="w3-small w3-center" style="margin-top:12px;"><?php //echo $n; 
                                                                                        ?> Ratings</div>-->
                                    </div>
                                    <div class="w3-right w3-light-gray w3-padding w3-center" style="width:15%;">
                                        <br>
                                        <?php
                                        $str = "Select min(rate) from rooms where hotelid='$hid'";
                                        $rec = mysqli_query($con, $str);
                                        $r = mysqli_fetch_array($rec);
                                        echo '<span class="w3-small">Rate starts @ </span><br><strong class="w3-text-red">Rs. ' . $r[0] . '</strong>';
                                        ?>
                                        <br>
                                        <span class="w3-tiny">Per Night</span>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="w3-quarter w3-center">
                            <span class="w3-large w3-bottombar"><strong>Select Filters <i class="fa fa-filter" aria-hidden="true"></i></strong></span>
                            <div class="w3-container w3-left-align" style="padding-left:32px;">
                                <h6 class="mt-2"><i class="fa fa-star-o" aria-hidden="true"></i> Star Category</h6>
                                <p>
                                    <select name="star" class="w3-select w3-border w3-border-black w3-small">
                                        <option disabled selected>Select Star Category</option>
                                        <option value="5">5 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" name="submit" value="Search" class="btn btn-outline-danger w3-right">
                                </p>
                            </div>
                        </div>
                    </div>
            </form>
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
if (isset($_GET["user"])) {
    echo '<script> alert("This E-mail is already registered"); </script>';
}
?>

<script type="text/javascript">
    $("#Datepicker1").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        minDate: new Date(),
        maxDate: '+2y',
        onSelect: function(date) {

            var selectedDate = new Date(date);
            var msecsInADay = 86400000;
            var endDate = new Date(selectedDate.getTime() + msecsInADay);

            //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
            $("#Datepicker2").datepicker("option", "minDate", endDate);
            $("#Datepicker2").datepicker("option", "maxDate", '+2y');

        }
    });

    $("#Datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true
    });
</script>