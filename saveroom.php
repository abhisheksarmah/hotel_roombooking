<?php
	include "connect.php";
	if(isset($_POST["submit"]))
	{
		$hotelid=$_POST["hotelid"];
		$roomtype=$_POST["roomtype"];
		$rsize=$_POST["rsize"];
		$btype=$_POST["btype"];
        $guest=$_POST["guest"];
		$rate=$_POST["rate"];
		$nor=$_POST["nor"];	
		if($roomtype=="Others")
		{
			$roomtype=$_POST["rtype"];	
		}
		
		$target_dir = "Rooms/";
		$file = $target_dir.basename($_FILES["file1"]["name"]);
		$fileData = pathinfo(basename($_FILES["file1"]["name"]));		
		$fileName = uniqid().'.'.$fileData['extension'];
		$target_path = "Rooms/" . $fileName;	
		while(file_exists($target_path))
		{
			$fileName = uniqid().'.'.$fileData['extension'];
			$target_path = "Rooms/" . $fileName;
		}
        
		$image="Rooms/".$fileName;
		
		$roomid=0;
		
		if(move_uploaded_file($_FILES["file1"]["tmp_name"], $target_path)) 
		{
			$sql="insert into rooms values(null,'$hotelid','$roomtype','$image','$rsize','$btype','$guest','$rate','$nor')";
			$result=mysqli_query($con,$sql);
			
			/*$rec=mysqli_query($con,"Select last_insert_id()");
			$r=mysqli_fetch_array($rec);
			$roomid=$r[0];*/
		}
		else
		{
			header("location:rooms.php?upload=error");		
		}
		
		header("location:rooms.php?ok=1");
	}
?>