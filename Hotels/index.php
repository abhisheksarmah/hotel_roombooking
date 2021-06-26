<?php
	session_start();
	$_SESSION["page"]="index.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hotel NE</title>
<link href="css/w3.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{
		font-family: 'Montserrat', sans-serif;
	}
	label.error{
			color:#F00;	
			font-size:x-small;
		}
	.tbg{
		background-image:url(images/calendar.png);
		background-position:left;
		background-repeat:no-repeat;
		padding-left:40px;
	}
	.ubg{
		background-image:url(images/user-small.jpg);
		background-position:left;
		background-repeat:no-repeat;
		padding-left:45px;
	}
	.pbg{
		background-image:url(images/lock.jpg);
		background-position:left;
		background-repeat:no-repeat;
		padding-left:45px;
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
	<img src="images/banner_bg.jpg" style="width:100%;">
    <div class="w3-display-topmiddle" style="width:100%;">
    	<div class="w3-container w3-padding-12 w3-card w3-white w3-opacity-min">
            <div class="w3-left" style="width:50%;">
                <img src="images/logo.jpg" style="width:40%;">
            </div>
            <div class="w3-right w3-right-align" style="padding-top:16px;">
            	<?php
					if(isset($_SESSION["uname"]))
					{
						echo 'Welcome '.$_SESSION["uname"];
						echo '&nbsp;&nbsp;<a href="logout.php" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Logout</a>';
					}
					else
					{
				?>
                <a onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Sign In</a>&nbsp;&nbsp;
                <a onclick="document.getElementById('id02').style.display='block'" class="w3-btn w3-round w3-white w3-border w3-border-indigo w3-small">Sign Up</a>
                <?php
					}
				?>
            </div>
        </div>
        <div class="w3-card w3-white w3-padding-32 w3-opacity-off w3-round-large" style="width:60%; margin:124px auto; opacity:0.9;">
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
                        <input type="text" required id="Datepicker1" name="cindate" class="w3-input w3-border tbg">
                    </div>
                    <div class="w3-left" style="width:30%; margin-left:10px;">
                        <label>Check-out Date</label>
                        <input type="text" required id="Datepicker2" name="coutdate" class="w3-input w3-border tbg">
                    </div>
                    <div class="w3-left" style="width:17%; margin-left:10px;">
                        <label>No. of Rooms</label>
                        <input type="number" required id="nor" name="nor" class="w3-input w3-border">
                    </div>
                    <div class="w3-left" style="width:17%; margin-left:10px;">
                        <label>No. of Guest</label>
                        <input type="number" required id="nog" name="nog" class="w3-input w3-border">
                    </div>
                </div>
                <div class="w3-container">
                    <div class="w3-right" style="width:20%; margin-left:10px; padding-top:16px;">
                        <input type="submit" name="submit" value="Search" class="w3-btn w3-block w3-red">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="w3-display-bottomleft w3-container w3-black w3-padding-24 w3-opacity-min" style="width:100%;">
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
                  <h3>Newsletter</h3>
                  Subscribe to our newsletter<br>
                  <div class="w3-left" style="width:80%;">
                  	<input type="text" id="email" name="email" class="w3-input w3-border" placeholder="Enter Ur Email" style="height:35px;">
                  </div>
                  <div class="w3-right"><input type="submit" name="go" value="Go" class="w3-btn w3-red" style="height:35px;"></div>
              </div>
          </div>
          <div class="w3-quarter">
              <div class="w3-container">
                  <h3>Developer</h3>
                  Designed and Maintained By<br>
              </div>
          </div>
      </div>
      <div class="w3-container w3-padding-12 w3-right-align">
          Copyright ©2019 All rights reserved
      </div>
    </div>
</div>

<!-- Login Modal -->
<div id="id01" class="w3-modal">
<div class="w3-modal-content w3-animate-top" style="width:350px;">
  <div class="w3-card-4 w3-lime w3-opacity-off">
    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-lime w3-medium">&times;</span>
    <div class="w3-container w3-center" style="padding-top:16px;">
          <img src="images/login.png" class="w3-white w3-circle w3-card" style="width:25%;"/><br>
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
    <span onclick="document.getElementById('id02').style.display='none'" 
    class="w3-button w3-display-topright">&times;</span>
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
	if(isset($_GET["save"]))
	{
		echo '<script> alert("Registration Completed"); </script>';
	}
	if(isset($_GET["user"]))
	{
		echo '<script> alert("This E-mail is already registered"); </script>';
	}
	if(isset($_GET["err"]))
	{
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
    onSelect: function(date){

        var selectedDate = new Date(date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);

       //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
        $("#Datepicker2").datepicker( "option", "minDate", endDate );
        $("#Datepicker2").datepicker( "option", "maxDate", '+2y' );

    }
});

$("#Datepicker2").datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true
});
</script>