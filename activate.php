<?php

session_start();

include 'db.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updatequery = "update users set status='active' where token='$token' ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account Updated Successfully";
            header('location: login.php');
        }else{
            $_SESSION['msg'] = "You are logged out";
            header('location: login.php');
        }
    }else{
        $_SESSION['msg'] = "Account Not Updated";
        header('location:registration.php');
    }
}



?>