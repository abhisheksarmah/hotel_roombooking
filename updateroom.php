<?php
	include "connect.php";

	if(isset($_POST["submit"]))
	{
		$roomid=$_POST["roomid"];
		$roomtype=$_POST["rtype"];
		$rsize=$_POST["rsize"];
		$btype=$_POST["btype"];
        $guest=$_POST["guest"];
		$rate=$_POST["rate"];
		$nor=$_POST["nor"];	
		$hid=$_POST["hid"];
		
		$sql="update rooms set roomtype='$roomtype',roomsize='$rsize',bedtype='$btype',guests='$guest',rate='$rate',nor='$nor' where roomid='$roomid'";
		$result=mysqli_query($con,$sql);
		header("location:vhotelrooms.php?id=".$hid);
	}
?>