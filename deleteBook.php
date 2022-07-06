<?php
include 'db-connect.php';
if(isset($_GET['deleteBookId'])){
    $bookId=$_GET['deleteBookId'];

    $delete_user = mysqli_query($dbconnect, "DELETE FROM `books` WHERE bookId = $bookId");
    if($delete_user){
        echo "<script> 
        alert('Book deleted successfully!');
        </script>";
      header('location:admin-page.php');
    }
    else{
        die(mysqli_error($dbconnect));
    }
}
?>