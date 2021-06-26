<?php
	include "connect.php";
	if(isset($_POST["submit"]))
	{
		$hotelid=$_POST["hotelid"];
		if($hotelid==0)
		{
			header("location:hotelphotos.php?error=1");
			return;
		}
        
		$total = count($_FILES['hphoto']['name']);
		
		$target_dir = "Hotels/";
		for( $i=0 ; $i < $total ; $i++ ) 
		{
			$file = $target_dir.basename($_FILES["hphoto"]["name"][$i]);
			$fileData = pathinfo(basename($_FILES["hphoto"]["name"][$i]));		
			$fileName = uniqid().'.'.$fileData['extension'];
			$target_path = "Hotels/" . $fileName;	
			while(file_exists($target_path))
			{
				$fileName = uniqid() . '.' . $fileData['extension'];
				$target_path = "Hotels/" . $fileName;
			}
			$image="Hotels/".$fileName;
			if(move_uploaded_file($_FILES["hphoto"]["tmp_name"][$i], $target_path)) 
			{
				$sql="insert into photos values(null,'$hotelid','$image')";
				$result=mysqli_query($con,$sql);
			}
		}
		if($result)
		{
			header("location:hotelphotos.php?ok=1");	
		}
		else
		{
			echo mysqli_error($con);
		}
	}
?>