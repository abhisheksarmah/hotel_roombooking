<?php
include('connect.php');
if(isset($_POST[""]))
{
	$uname=$_POST['mail'];
	$pass=$_POST['password'];
	$pass2=$_POST['password2'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	


	$str="select * from customer where email='$uname'";
	$result=mysqli_query($con,$str);
	$n=mysqli_num_rows($result);
	if($n>0)
	{
		header("location:index.php?dupli=1");
		return;
	}
	
	$sql="insert into customer (email,password, password2, name, address,contact) values('$uname', '$pass', '$pass2', '$name', '$address', '$contact')";
	$result=mysqli_query($con,$sql);
	
	if($result)
	{
		header("location:index.php?save=1");
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>