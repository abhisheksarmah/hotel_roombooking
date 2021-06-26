<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Add Room's Details</title>
    <link href="css/calender.css" type="text/css" rel="stylesheet">
    <link href="css/w3.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#rt").change(function() {
                var rt = $(this).val();
                if (rt == "Others") {
                    $("#rtt").attr("style", "display:block");
                    $("#rtype").attr("required", "true");
                } else {
                    $("#rtt").attr("style", "display:none");
                    $("#rtype").removeAttr("required");
                }
            });
        });
    </script>
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
            <img src="images/logo3.jpg" class="w3-animate-zoom" style="width:200px;">
        </div>
        <div class="w3-center">
            <b class="w3-large">Welcome Admin </b> &nbsp;&nbsp;&nbsp;
            <a href="adminlogout.php" class="btn btn-outline-danger w3-right"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
    <?php include "adminMenu.php"; ?>
    <div class="w3-container w3-black w3-opacity-min p-4 w3-round-medium" style="width:50%; margin:48px auto;">
        <h3 align="center">ADD NEW ROOM</h3>
        <div class="w3-container" style="padding-bottom:16px;">
            <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="saveroom.php">
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
                    <label>Room Type:</label>
                    <select name="roomtype" id="rt" class="w3-input w3-border w3-round-medium">
                        <option disabled selected>Select Room Type</option>
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
                    <input type="text" id="rtype" name="rtype" class="w3-input w3-border w3-round-medium" placeholder="Enter Room Type">
                </p>
                <p>
                    <label>Room Photo:</label>
                    <input type="file" name="file1" class="w3-input w3-border w3-round-medium" required>
                </p>
                <p>
                    <label>Room Size:</label>
                    <input type="text" name="rsize" class="w3-input w3-border w3-round-medium" placeholder="Enter Room Size" required>
                </p>
                <p>
                    <label>Bed Type:</label>
                    <input type="text" name="btype" class="w3-input w3-border w3-round-medium" placeholder="Enter Bed Type" required>
                </p>

                <p>
                    <label>Capacity(No. of Guest):</label>
                    <input type="text" name="guest" class="w3-input w3-border w3-round-medium" placeholder="Enter Capacity" required>
                </p>
                <p>
                    <label>Room Rate:</label>
                    <input type="text" name="rate" class="w3-input w3-border w3-round-medium" placeholder="Enter Rate" required>
                </p>
                <p>
                    <label>No. of such rooms in the hotel:</label>
                    <input type="text" name="nor" class="w3-input w3-border w3-round-medium" placeholder="Enter No. of Rooms" required>
                </p>
                <p align="right">
                    <input type="submit" name="submit" class="btn btn-outline-success w3-right" value="Submit Record">
                </p>

            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET["ok"])) {
    echo '<script> alert("Room Added!!"); </script>';
}
?>