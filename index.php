<?php
session_start();
$_SESSION["page"] = "index.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assam Hotels</title>
    <!-- <link href="css/w3.css" type="text/css" rel="stylesheet"> -->
    <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
    <!--<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url(images/banner_bg.jpg)
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form3").validate({
                rules: {
                    name: {
                        required: true
                    },
                    contact: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    mail: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password2: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: {
                        required: "Please Enter Name"
                    },
                    password: {
                        required: "Please Enter a password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    password2: {
                        required: "Please retype password",
                        equalTo: "Both passwords are not matching"
                    },
                    contact: {
                        required: "Please enter a phone number",
                        digits: "Enter only digits",
                        minlength: "Your phone number must be 10 characters long"

                    },
                    mail: {
                        required: "Please Enter E-mail",
                        email: "Please enter a valid email address"
                    }
                }
            });
        });
    </script>
</head>

<body>
    <div class="">
        <div class="top" style="width:100%;">
            <div class="w3-container w3-padding-12 w3-card w3-black w3-opacity-off">
                <div class="w3-center" style="width:50%;">
                    <img src="images/logo3.jpg" style="width:40%;">
                </div>
                <div class="text-right">
                    <?php
                    if (isset($_SESSION["uname"])) {
                        echo '<h5 class="w3-left"><i class="fa fa-handshake-o" aria-hidden="true"></i>   WELCOME  </h5> &nbsp;&nbsp;&nbsp;&nbsp;' . $_SESSION["uname"];
                        // echo '&nbsp;&nbsp;<a href="logout.php" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Logout</a>';
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
                        <a style="float: right;" onclick="document.getElementById('id01').style.display='block'" class="btn btn-outline-primary">Sign In</a>
                        <a style="float: right;" onclick="document.getElementById('id02').style.display='block'" class="btn btn-outline-info">Sign Up</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="w3-card w3-black w3-padding-32 w3-opacity-off w3-round-large" style="width:60%; margin:80px auto; opacity:0.9;">
                <form name="form1" id="form1" method="post" action="search.php">
                    <div class="w3-container">
                        <div class="w3-left" style="width:98%; margin-left:10px;">
                            <label>Enter City</label>
                            <input type="text" required id="city" name="city" class="w3-input w3-border">
                        </div>
                    </div>

                    <div class="w3-container" style="padding-top:12px;">
                        <div class="w3-left" style="width:30%; margin-left:10px;">
                            <label>Check-in Date</label>
                            <input type="text" required id="Datepicker1" name="cindate" class="w3-input w3-border">
                        </div>
                        <div class="w3-left" style="width:30%; margin-left:10px;">
                            <label>Check-out Date</label>
                            <input type="text" required id="Datepicker2" name="coutdate" class="w3-input w3-border tbg">
                        </div>
                        <div class="w3-left" style="width:17%; margin-left:10px;">
                            <label>No. of Rooms</label>
                            <input type="number" required id="nor" name="nor" min="1" max="8" placeholder="maximum 8" class="w3-input w3-border">
                        </div>
                        <div class="w3-left" style="width:17%; margin-left:10px;">
                            <label>No. of Guest</label>
                            <input type="number" required id="nog" name="nog" min="1" max="16" placeholder="maximum 16" class="w3-input w3-border">
                        </div>
                    </div>
                    <div class="w3-container">
                        <div class="w3-right" style="width:20%; margin-left:10px; padding-top:16px;">
                            <button type="submit" name="submit" value="Search" class="btn btn-outline-success">SEARCH <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
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
        <!-- <div class="row w-100 mt-3">
  <div class="">
    <div class="card col-4">
      <div class="card-body">
        <h5 class="card-title">About Agency</h5>
        <p class="card-text"> The world has become so fasted that people don’t want to standby reading page of info they would much rather look at a presentation and understand message.</p>
      </div>
     
    </div>
  </div>
  <div class="">
    <div class="card col-4">
    <div class="card-body">
        <h5 class="card-title">Contact Us</h5>
        <p class="card-text"><a href="#">+91 1235678936</a></p>
      </div>
    </div>
    <div class="card col-4">
      <div class="card-body">
        <h5 class="card-title">Developer</h5>
        <p class="card-text">Designed and Maintained By ABHILEKH SARMAH</p>
        <a>Copyright ©2021 All rights reserved</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
   
  </div>
</div> -->
        <!-- <div class=" w3-container w3-black w3-padding-20 w3-opacity-min" style="width:100%;">
      <div class="w3-row-padding w3-small">
          <div class="w3-quarter">
              <div class="w3-container">
                  <h3>About Agency</h3>
                  The world has become so fasted that people don’t want to standby reading page of info they would much rather look at a presentation and understand message. 
              </div>
          </div>
          
          <div class="w3-quarter">
              <div class="w3-container">
                  <h3>Quick Links</h3>
                  <ul>
                      <li>Sitemaps</li>
                      <li>Privacy Policy</li>
                      <li>Terms of Use</li>
                      <li>Advertise</li>
                      <li>Feedback</li>
                  </ul>
              </div>
          </div>
          <div class="w3-quarter">
              <div class="w3-container" style="width:90%;">
                  <h3>Contact Us</h3>
                  <div class="w3-left" style="width:80%;">
                  	<a href="#">+91 1235678936</a>
                  </div>
              </div>
          </div>
          <div class="w3-quarter">
              <div class="w3-container">
                  <h3>Developer</h3>
                  Designed and Maintained By ABHILEKH SARMAH<br>
              </div>
          </div>
      </div>
      <div class="w3-container w3-padding-12 w3-right-align">
          Copyright ©2021 All rights reserved
      </div>
    </div> -->
    </div>

    <!-- Login Modal -->
    <div id="id01" class="modal">
        <div class="w3-modal-content w3-animate-zoom rounded" style="width:350px;">
            <div class="w3-card-4 w3-black w3-opacity-off rounded">
                <p onclick="document.getElementById('id01').style.display='none'" class="text-danger btn w3-btn-black p-2 w3-display-topright"><i class="fa fa-times" aria-hidden="true"></i></p>
                <div class="w3-container w3-center" style="padding-top:16px;">
                    <img src="images/login.png" class="w3-white w3-circle w3-card mb-3" style="width:25%;" /><br>
                    <span class="w3-large login"><strong>Login Here</strong></span>
                </div>
                <div class="w3-container w3-small">
                    <form name="form2" id="form2" method="post" action="login.php">
                        <p>
                            <label>Username:</label>
                            <input type="email" required name="username" class="w3-input w3-border w3-border-black w3-round-medium w3-hover-border-blue ubg">
                        </p>
                        <p>
                            <label>Password:</label>
                            <input type="password" required name="password" class="w3-input w3-border w3-border-black w3-round-medium w3-hover-border-blue pbg">
                        </p>
                        <p>
                            <input type="submit" name="login" class="w3-btn w3-block w3-blue w3-round" value="Login">
                        </p>
                        <p align="right">
                            New User? Click on Sign Up to Create an Account
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- Signup Modal -->
    <div id="id02" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="width:400px;">
            <div class=" w3-card-4 w3-black w3-opacity-off">
                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <div class="w3-container w3-center" style="padding-top:16px;">
                    <span class="w3-large login"><strong>User Registration</strong></span>
                    <hr>
                </div>
                <div class="w3-container w3-small">
                    <form name="form3" id="form3" method="post" action="registration.php">
                        <p>
                            <input type="email" name="mail" class="w3-input w3-border w3-round-medium" placeholder="E-Mail">
                        </p>
                        <p>
                            <input type="password" id="password" name="password" class="w3-input w3-border w3-round-medium" placeholder="Password">
                        </p>
                        <p>
                            <input type="password" id="password2" name="password2" class="w3-input w3-border w3-round-medium" placeholder="Confirm Password">
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
                            <input type="submit" name="registration" class="w3-btn w3-block w3-red w3-round" value="Submit">
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>

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
        dateFormat: 'dd-mm-yy',
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
        dateFormat: 'dd-mm-yy',
        changeMonth: true
    });
</script>
<?php
if (isset($_GET["room"])) {
    echo '<script> alert("Not enough rooms of your choice are available. Please Check other options"); </script>';
}
?>