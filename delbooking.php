<?php
	include "connect.php";
    $bid=$_GET["bid"];
    $str="Delete from booking where bid='$bid'";
    mysqli_query($con,$str);
    header("location:viewbookings.php");
?>