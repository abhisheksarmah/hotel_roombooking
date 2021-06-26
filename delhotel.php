<?php
	include "connect.php";
    $id=$_GET["id"];
    $str="Delete from hotels where id='$id'";
    mysqli_query($con,$str);
    header("location:vhotels.php");
?>