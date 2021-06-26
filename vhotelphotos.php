<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Assam Hotels</title>
	<link href="css/calender.css" type="text/css" rel="stylesheet">
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
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
	<script>
		function condel() {
			return confirm("Confirm Delete??");
		}
	</script>
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
	<?php
	include "connect.php";
	if (isset($_GET["id"])) {
		$hid = $_GET["id"];
		$sql = "Select * from hotels where id='$hid'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$hotel = $row[1];
	}
	?>
	<div class="w3-container w3-light-gray w3-round-medium" style="width:80%; margin:24px auto;">
		<h3 align="center" class="w3-bottombar">HOTEL PHOTOS</h3>
		<div class="w3-container" style="padding-bottom:16px;">
			<h5 style="padding-left:32px;"><strong><?php echo $hotel; ?></strong></h5>
			<div class="w3-row-padding">
				<?php
				$sql = "Select * from photos where hid='$hid'";
				$result = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($result)) {
					echo '<div class="w3-quarter">
			  			<div class="w3-container w3-padding-16 w3-center">
							<img src="' . $row[2] . '" class="w3-card" style="width:100%; margin-bottom:4px;"><br>
							<a href="delphoto.php?id=' . $row[0] . '&hid=' . $hid . '" onClick="return condel();" class="w3-btn w3-round w3-red w3-tiny">Delete Photo</a>
						</div>
					</div>';
				}
				?>
			</div>
		</div>
	</div>
	<a class="btn btn-outline-dark w3-right m-2 p-2" href="vhotels.php">Go Back <i class="fa fa-backward" aria-hidden="true"></i></a>
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