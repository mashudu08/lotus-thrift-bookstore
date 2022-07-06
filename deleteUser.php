<?php
include 'db-connect.php';
if(isset($_GET['deleteUserId'])){
    $userId=$_GET['deleteUserId'];

    $delete_user = mysqli_query($dbconnect, "DELETE FROM `user` WHERE userId = $userId");
    if($delete_user){
       echo 
       "<script>
       alert('User deleted successfully!');
       </script>";
      header('location:admin-page.php');
    }
    else{
        die(mysqli_error($dbconnect));
    }
}
?>