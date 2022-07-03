<?php
include 'db-connect.php';
if(isset($_GET['verifyUsers'])){
    $verify=$_GET['verifyUsers'];
     
    $verify_user = mysqli_query($dbconnect, "UPDATE `user` SET isVerified = true WHERE isVerified = false;");
    if($verify_user){
    //   echo "User verified successfully";
      header('location:admin-page.php');
    }
    else{
        die(mysqli_error($dbconnect));
    }
}
?>