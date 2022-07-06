<?php
include 'db-connect.php';
if(isset($_GET['deleteCartId'])){
    $cartId=$_GET['deleteCartId'];

    $delete_cart = mysqli_query($dbconnect, "DELETE FROM `cart` WHERE cartId = $cartId");
    if($delete_cart){
       echo "<script>
       alert('Item deleted successfully!');
       </script>";

      header('location:cart-page.php');
    }
    else{
        die(mysqli_error($dbconnect));
    }
}
?>