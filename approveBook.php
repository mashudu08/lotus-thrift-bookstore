<?php
include 'db-connect.php';
    $approveBook=$_GET['approveBookId'];
if(isset($_GET['approveBookId'])){

    $approveBook = mysqli_query($dbconnect, "UPDATE `sell` SET requestApproved = true WHERE requestApproved = false");
    if($approveBook){
        echo "<script> 
              alert('Request approved!');
              </script>";
      header('location:admin-page.php');
    }
    else{
        die(mysqli_error($dbconnect));
    }
}
?>