<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Homepage</title>
    <link href="css/calender.css" type="text/css" rel="stylesheet">
    <link href="css/w3.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script>
		$(document).ready(function() {
            $("#rt").change(function() {
                var rt=$(this).val();
				if(rt=="Others")
				{
					$("#rtt").attr("style","display:block");	
					$("#rtype").attr("required","true");
					$("#rtype").val("");	
				}
				else
				{
					$("#rtt").attr("style","display:none");
					$("#rtype").removeAttr("required");	
					var rt=$(this).val();
					$("#rtype").val(rt);
				}
            });
        });
	</script>
	<style type="text/css">
      body{
		font-family: 'Montserrat', sans-serif;
		}
		label.error{
				color:#F00;	
				font-size:x-small;
			}
    </style>
</head>
    
<body>
	<div class="w3-container w3-red" style="padding-top:8px; padding-bottom:8px;">
    <div class="w3-left" style="width:200px;">
        <img src="images/logo.jpg" class="w3-animate-left" style="width:200px;">
    </div>
    <div class="w3-right">
    	<b class="w3-large">Welcome Admin  </b> &nbsp;&nbsp;&nbsp;
    	<a href="adminlogout.php" class="w3-btn w3-red w3-border w3-border-white w3-round-medium"><i class="fa fa-sign-out"></i> Logout</a>	
    </div>
</div> 
<?php include "adminMenu.php"; ?>
<div class="w3-container w3-light-gray w3-round-medium" style="width:50%; margin:48px auto;">
  <h3 align="center">EDIT ROOM</h3>
  <div class="w3-container" style="padding-bottom:16px;">
  	<?php
		include "connect.php";
		$id=$_GET["id"];
		$hid=$_GET["hid"];
		$result=mysqli_query($con,"Select * from rooms where roomid='$id'");
		$row=mysqli_fetch_array($result);
	?>
  	<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="updateroom.php">
    	<input type="hidden" name="roomid" value="<?php echo $id; ?>"><input type="hidden" name="hid" value="<?php echo $hid; ?>">
    	<p>
        	<label>Room Type:</label>
            <select name="roomtype" id="rt" class="w3-input w3-border w3-round-medium">
            	<option disabled selected><?php echo $row["roomtype"]; ?></option>
				<option>Classic Room</option>
                <option>Corporate Room</option>
                <option>Executive</option>
                <option>Presidential Suite</option>
                <option>Deluxe Room</option>
                <option>Deluxe Twin Bed</option>
                <option>Super Deluxe Room</option>
                <option>Saver Single</option>
                <option>Saver Double</option>
                <option>Others</option>
            </select>
        </p>
        <p id="rtt" style="display:none;">
        	<input type="text" id="rtype" name="rtype" class="w3-input w3-border w3-round-medium" placeholder="Enter Room Type" value="<?php echo $row["roomtype"]; ?>">
        </p>
        <p>
        	<label>Room Size:</label>
            <input type="text" name="rsize" class="w3-input w3-border w3-round-medium" value="<?php echo $row["roomsize"]; ?>">
        </p>
        <p>
        	<label>Bed Type:</label>
            <input type="text" name="btype" class="w3-input w3-border w3-round-medium" value="<?php echo $row["bedtype"]; ?>">
        </p>
        <p>
        	<label>Capacity(No. of Guest):</label>
            <input type="text" name="guest" class="w3-input w3-border w3-round-medium" value="<?php echo $row["guests"]; ?>">
        </p>
        <p>
        	<label>Room Rate:</label>
            <input type="text" name="rate" class="w3-input w3-border w3-round-medium" value="<?php echo $row["rate"]; ?>">
        </p>
        <p>
        	<label>No. of such rooms in the hotel:</label>
            <input type="text" name="nor" class="w3-input w3-border w3-round-medium" value="<?php echo $row["nor"]; ?>">
        </p>
        <p align="right">
        	<input type="submit" name="submit" class="w3-btn w3-red w3-round-medium w3-block" value="Update Record">
        </p>
        
    </form>
  </div>
</div>      
</body>
</html>
<?php
	if(isset($_GET["ok"]))
	{
		echo '<script> alert("Room Added!!"); </script>';	
	}
?>