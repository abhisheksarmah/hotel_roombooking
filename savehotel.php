<?php
	include "connect.php";
	if(isset($_POST["submit"]))
	{
		$name=$_POST["name"];
		$star=$_POST["star"];
		$city=$_POST["city"];
		$address=$_POST["address"];
		$contact=$_POST["contact"];
		$mail=$_POST["mail"];
		
		$sql="insert into hotels values(null,'$name','$star','$city','$address','$contact','$mail','0')";
		$result=mysqli_query($con,$sql);
        
		if($result)
		{
			header("location:hotels.php?ok=1");	
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>