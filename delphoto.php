<?php
	include "connect.php";
    $id=$_GET["id"];
    $hid=$_GET["hid"];
    $str="Delete from photos where id='$id' and hid='$hid'";
    mysqli_query($con,$str);
    header("location:vhotelphotos.php?id=".$hid);
?>