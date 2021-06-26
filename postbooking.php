<?php
	session_start();
	include "connect.php";
	if(isset($_POST["submit"]))
	{
		$hid=$_POST["hotelid"];
		$roomid=$_POST["roomid"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		$contact=$_POST["contact"];
		$cin=$_POST["cindate"];
		$cout=$_POST["coutdate"];
		$rtype=$_POST["roomtype"];
		$nor=$_POST["norooms"];	
		$amount=$_POST["amount"];
		$date=date("Y-m-d");
		
		$date1=date_create($cin);
		$date2=date_create($cout);
		$diff=date_diff($date1,$date2);
		$days=intval($diff->format("%a"));
		
		$str="insert into booking values(null,'$hid','$name','$email','$contact','$cin','$cout','$rtype','$nor','$amount','$date','Pending')";	
		$result=mysqli_query($con,$str);
		if($result)
		{
			$sql="Select last_insert_id()";
			$rec=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($rec);
			$bid=$row[0];
			for($i=0;$i<=$days;$i++)
			{
				$bdate=date_format($date1,"Y-m-d");
				for($j=0;$j<$nor;$j++)
				{
					mysqli_query($con,"insert into booked values(null,'$bid','$bdate','$hid','$roomid')");
				}
				date_add($date1,date_interval_create_from_date_string("1 days"));
			}
			header("location:payment.php?bid=".$bid."&amount=".$amount."&phone=".$contact);
		}
		else
		{
			echo mysqli_error($con);	
		}
	}
?>