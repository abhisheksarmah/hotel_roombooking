<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Assam Hotels</title>
    <link href="css/w3.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
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
    <script>
        function condel() {
            return confirm("Are You Sure?");
        }
    </script>
</head>

<body>
    <div class="w3-display-container">
        <img src="images/background1.jpg" style="width:100%;">
        <div class="w3-display-topmiddle" style="width:100%;">
            <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off">
                <div class="w3-left" style="width:50%;">
                    <a href="index.php"> <img src="images/logo3.jpg" style="width:40%;"></a>
                </div>
                <div class="w3-right w3-right-align" style="padding-top:40px;">
                    <?php
                    if (isset($_SESSION["uname"])) {
                        echo 'Welcome ' . $_SESSION["uname"];
                        //echo '&nbsp;&nbsp;<a href="logout.php" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Logout</a>';
                    ?>
                        &nbsp;&nbsp;
                        <div class="w3-dropdown-hover w3-right">
                            <a href="" class="w3-btn w3-white w3-border w3-round">My Account <i class="fa fa-caret-down"></i></a>
                            <div class="w3-dropdown-content w3-bar-block w3-black w3-border p-1">
                                <a href="mybookings.php" class="btn btn-outline-light w3-hover-white"><i class="fa fa-list"></i> My Bookings</a>
                                <a href="logout.php" class="btn btn-outline-danger w3-hover-red"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a onclick="document.getElementById('id01').style.display='block'" class="btn m-2 w3-right btn-outline-info">Sign In</a>
                        <a onclick="document.getElementById('id02').style.display='block'" class="btn m-2 btn-outline-warning w3-right">Sign Up</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="w3-card w3-white w3-padding-16 w3-opacity-off w3-round-large" style="width:90%; margin:58px auto; opacity:0.9;">
                <div class="w3-container w3-center">
                    <h3 class="w3-bottombar">My Booking</h3>
                </div>
                <div class="table table-responsive text-center">
                    <table class="table-stripped table-bordered table-sm" style="width:100%;">
                        <thead>
                            <th>Booking ID</th>
                            <th>Booking Date</th>
                            <th>Hotel Name</th>
                            <th>Checkin Date</th>
                            <th>Checkout Date</th>
                            <th>Room Type</th>
                            <th>No of Room</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th></th>
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            <?php
                            include "connect.php";
                            $userid = $_SESSION["uname"];
                            $sql = "Select A.*,B.name as hname from booking as A,hotels as B where A.email='$userid' and A.hid=B.id order by A.bid desc";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>' . $row["bid"] . '</td>';
                                echo '<td>' . $row["bookdate"] . '</td>';
                                echo '<td>' . $row["hname"] . '</td>';
                                echo '<td>' . $row["checkin"] . '</td>';
                                echo '<td>' . $row["checkout"] . '</td>';
                                echo '<td>' . $row["roomtype"] . '</td>';
                                echo '<td>' . $row["noroom"] . '</td>';
                                echo '<td>' . $row["amount"] . '</td>';
                                echo '<td class="w3-text-red">' . $row["status"] . '</td>';
                                echo '<td><a href="cancelbooking.php?bid=' . $row["bid"] . '" onClick="return condel();" class="btn btn-outline-danger">Cancel   <i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
                            ?>
                            <?php
                                if ($row["status"] == "Pending") {
                                    echo '<td><a href="payment.php?bid=' . $row["bid"] . '&amount=' . $row["amount"] . '&phone=' . $row["contact"] . '" class="btn btn-outline-info">Pay Now  <i class="fa fa-credit-card-alt" aria-hidden="true"></i></a></td>';
                                } else {
                                    echo '<td>&nbsp;</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row bg-dark" style="margin-top: 5px;">
            <div class="col-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="w3-dropdown-hover bg-primary">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> ABOUT AGENCY </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-zoom">
                            <p class="text-center p-5 text-dark"><b>The world has become so fasted that people don’t want to standby reading page of info they would much rather look at a presentation and understand message.</b></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="card text-light bg-danger">
                    <div class="w3-dropdown-hover bg-danger">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> CONTACT_US </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-top">
                            <p class="text-center p-5 btn-link"><b>+91 1235678936</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-light bg-secondary">
                    <div class="w3-dropdown-hover bg-secondary">
                        <div class=" d-flex align-items-center justify-content-between">
                            <div class="card-body text-center"> <b> DEVELOPER </b></div>
                        </div>
                        <div class="dropdown w3-dropdown-content w3-bar-block w3-border w3-animate-right">
                            <p class="text-center p-5"><b>Designed and Maintained By ABHILEKH SARMAH</b></p>
                        </div>
                    </div>
                </div>
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
if (isset($_GET["user"])) {
    echo '<script> alert("This E-mail is already registered"); </script>';
}
if (isset($_GET["err"])) {
    echo '<script> alert("Incorrect Username or Password"); </script>';
}
?>

<script type="text/javascript">
    /*$(function() {
	$( "#Datepicker1" ).datepicker({
		minDate:0
	}); 
});
$(function() {
	$( "#Datepicker2" ).datepicker({
		minDate:+1
	}); 
});*/

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
<?php
if (isset($_GET["room"])) {
    echo '<script> alert("Not enough rooms of your choice are available. Please Check other options"); </script>';
}
?>