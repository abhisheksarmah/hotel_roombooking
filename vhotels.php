<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>View added Hotels</title>
	<link href="css/calender.css" type="text/css" rel="stylesheet">
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<script>
	function condel() {
		return confirm("Confirm Delete??");
	}
</script>

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
	<div class="w3-container w3-light-gray w3-round-medium" style="width:90%; margin:48px auto;">
		<h3 align="center" class="w3-bottombar">HOTEL DETAILS</h3>
		<div class="w3-container" style="padding-bottom:16px;">
			<table class="w3-table-all w3-small">
				<thead>
					<th>Hotel Name</th>
					<th>Hotel Star</th>
					<th>City</th>
					<th>Address</th>
					<th>Contact No</th>
					<th>E-Mail</th>
					<th colspan="3">&nbsp;</th>
				</thead>
				<tbody>
					<?php
					include "connect.php";
					$sql = "Select * from hotels";
					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr>';
						echo '<td>' . $row[1] . '</td>';
						echo '<td>' . $row[2] . '</td>';
						echo '<td>' . $row[3] . '</td>';
						echo '<td>' . $row[4] . '</td>';
						echo '<td>' . $row[5] . '</td>';
						echo '<td>' . $row[6] . '</td>';
						echo '<td><a href="vhotelphotos.php?id=' . $row[0] . '" class="btn btn-outline-success"><i class="fa fa-eye"></i> View Photos</a></td>';
						echo '<td><a href="vhotelrooms.php?id=' . $row[0] . '" class="btn btn-outline-info"><i class="fa fa-eye"></i> View Rooms</a></td>';
						echo '<td><a href="delhotel.php?id=' . $row[0] . '" onClick="return condel();" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</a></td>';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
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