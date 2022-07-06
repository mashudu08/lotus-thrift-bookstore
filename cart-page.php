<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php 
include 'db-connect.php';
session_start();
$user_id =$_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- custom css style link -->
     <style><?php include "css/style.css"; ?> </style>
     <!-- font awesome link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cart</title>
</head>
<body>
    <?php include 'header.php'; ?>
  
    <h2 style="text-align:center;">Your Cart</h2>
    <div class="container">
        <br><br>
      <table class="table">
  <thead>
    <tr>
       <th scope="col">Item #</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Edit</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    $total = 0;
    $cart = mysqli_query($dbconnect, "SELECT * FROM `cart` WHERE userId = '$user_id'");

  if(mysqli_num_rows($cart) > 0){
    while($fetch_cart = mysqli_fetch_assoc($cart)){
    ?>
    <tr>
    <td><?php echo $fetch_cart['cartId'];?></td>
        <td><?php echo $fetch_cart['author'];?></td>
         <td><?php echo $fetch_cart['title'];?></td>
         <td>R<?php echo $fetch_cart['price'];?></td>
         <td><?php echo $fetch_cart['quantity']; ?></td>
         <td>R <?php echo number_format($fetch_cart['price'] * $fetch_cart['quantity'],2); ?></td>
         <td> 
         <button class="btn-button"><a href="editCart.php?deleteCartId='<?php echo $fetch_cart['cartId']; ?>'" 
         class="text-light" style="text-decoration:none;">Remove</a></button>
        </td>
    </tr>
        <?php
        $total = $total + $fetch_cart['quantity'] * $fetch_cart['price'];
      ?>   
   <?php 
    }
    }
    else{
      echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
    }
  ?>  
  </tbody>
</table>
  <?php echo 'Grand Total:  R'. $total?>
 <br>
 <button class="btn-cartbutton" style="margin: 50px 5px;" ><a href="checkout-page.php" 
 style="text-decoration:none; color: #fff; ">Checkout</a></button>&NonBreakingSpace;

 <button  class="btn-shopping">
            <a href="shopBooks-page.php" style="text-decoration:none;">Continue Shopping</a></button>
 </div>
 <?php include 'footer.php'; ?>
</body>
</html>