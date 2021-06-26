<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Add Hotel's Photos</title>
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
			<b class="w3-medium">Welcome Admin </b> &nbsp;&nbsp;&nbsp;
			<a href="adminlogout.php" class="btn btn-outline-danger w3-right"><i class="fa fa-power-off"></i> Logout</a>
		</div>
	</div>
	<?php include "adminMenu.php"; ?>
	<div class="w3-container w3-black w3-round-medium w3-opacity-min p-4" style="width:50%; margin:48px auto;">
		<h3 align="center">UPLOAD HOTEL PHOTOS</h3>
		<div class="w3-container" style="padding-bottom:16px;">
			<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="savehotelphoto.php">
				<p>
					<label>Hotel:</label>
					<select name="hotelid" class="w3-input w3-border w3-round-medium">
						<option disabled selected value="0">Select Hotel</option>
						<?php
						include "connect.php";
						$sql = "Select * from hotels";
						$result = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_array($result)) {
							echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
						}
						?>
					</select>
				</p>
				<p>
					<label>Select Hotel Photos:</label>
					<input name="hphoto[]" type="file" multiple required class="w3-input w3-border w3-round-medium" required>
				</p>

				<p align="right">
					<button type="submit" name="submit" class="btn btn-outline-info w3-right"><i class="fa fa-upload"></i> Upload Photos</button>
				</p>
			</form>
		</div>
	</div>
</body>

</html>
<?php
if (isset($_GET["ok"])) {
	echo '<script> alert("Photo Uploaded!!"); </script>';
}
if (isset($_GET["error"])) {
	echo '<script> alert("Please Select Hotel and Photos!!!"); </script>';
}
?>