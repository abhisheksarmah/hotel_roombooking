<?php
        include"connect.php";
       if(isset($_POST["registration"]))
       {
           $mail=$_POST["mail"];
           $name=$_POST["name"];
           $contact=$_POST["contact"];
           $address=$_POST["address"];
           $password=$_POST["password"];

           $sql="Select * from customer where email='$mail'";
           $result=mysqli_query($con,$sql);
           $n=mysqli_num_rows($result);
           if($n>0)
           {
             header("location:index.php?user=dupli");
             return;
           }

           $query="insert into customer values('$mail','$password','$name','$address','$contact')";
           $result=mysqli_query($con,$query);
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