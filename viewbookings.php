<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin view customer booking</title>
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
	<script>
		function condel() {
			return confirm("Are You Sure?");
		}
	</script>
</head>

<body>
	<div class="w3-container w3-black" style="padding-top:8px; padding-bottom:8px;">
		<div class="w3-left" style="width:200px;">
			<img src="images/logo3.jpg" class="w3-animate-left" style="width:200px;">
		</div>
		<div class="w3-center" style="padding-top:30px;">
			<b class="w3-medium">Welcome Admin </b> &nbsp;&nbsp;&nbsp;
			<a href="adminlogout.php" class="btn btn-outline-danger w3-right"><i class="fa fa-power-off"></i> Logout</a>
		</div>
	</div>
	<?php include "adminMenu.php"; ?>
	<div class="w3-container w3-light-gray w3-round-medium" style="width:90%; margin:48px auto;">
		<h3 align="center" class="w3-bottombar">HOTEL BOOKING DETAILS</h3>
		<div class="w3-container" style="padding-bottom:16px;">
			<table class="w3-table-all w3-small">
				<thead>
					<th>Booking ID</th>
					<th>Booking Date</th>
					<th>Hotel Name</th>
					<th>Customer Name</th>
					<th>E-Mail</th>
					<th>Phone</th>
					<th>Checkin Date</th>
					<th>Checkout Date</th>
					<th>Room Type</th>
					<th>No of Room</th>
					<th>Amount</th>
					<th>Payment</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					<?php
					include "connect.php";
					$sql = "Select A.*,B.name as hname from booking as A,hotels as B where A.hid=B.id order by A.bid desc";
					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr>';
						echo '<td>' . $row["bid"] . '</td>';
						echo '<td>' . $row["bookdate"] . '</td>';
						echo '<td>' . $row["hname"] . '</td>';
						echo '<td>' . $row["name"] . '</td>';
						echo '<td>' . $row["email"] . '</td>';
						echo '<td>' . $row["contact"] . '</td>';
						echo '<td>' . $row["checkin"] . '</td>';
						echo '<td>' . $row["checkout"] . '</td>';
						echo '<td>' . $row["roomtype"] . '</td>';
						echo '<td>' . $row["noroom"] . '</td>';
						echo '<td>' . $row["amount"] . '</td>';
						echo '<td>' . $row["status"] . '</td>';
						echo '<td><a href="delbooking.php?bid=' . $row["bid"] . '" onClick="return condel();" class="btn btn-outline-danger">Cancel</a></td>';
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