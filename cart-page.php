<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
      include 'db-connect.php';  //db connection 
      session_start();
      $user_id = $_SESSION['userId'];
      $book_id=$_GET['itemId'];
      $result= mysqli_query($dbconnect, "SELECT * FROM `books` WHERE bookId=$book_id");
      $row = mysqli_fetch_assoc($result);
      $author = $row['author'];
      $title =$row['title'];
      $price = $row['price'];
      $imgContent ='<img src="data:img/jpg;charset=utf8;base64,'.base64_encode($row['image']).'" width="100px" height="150px"/>';

      if(isset($_POST['add_to_cart'])){
        $book_title = mysqli_real_escape_string($dbconnect, $_POST['title']);
        $book_price =  mysqli_real_escape_string($dbconnect, $_POST['price']);
        $book_image = $imgContent;
        $book_quantity =  mysqli_real_escape_string($dbconnect,$_POST['quantity']);
    

        // mysqli_query($dbconnect, "INSERT INTO `cart`(bookId, userId, title, price, image, quantity) VALUES('$book_id', '$user_id', '$book_title', '$book_price', '$book_image', '$book_quantity')") ;

        $select_cart =  mysqli_query($dbconnect, "SELECT * FROM `cart` WHERE title = '$book_title' AND userId = '$user_id'") or die('query failed');

        if(mysqli_num_rows($select_cart) > 0){
          $message[] = 'product already added to cart!';
       }else{
          mysqli_query($dbconnect, "INSERT INTO `cart`(bookId, userId, title, price, image, quantity) VALUES('$book_id', '$user_id', '$book_title', '$book_price', '$book_image', '$book_quantity')") or die('query failed');
          $message[] = 'product added to cart!';
      }
      };
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
    <style><?php include "css/cartStyles.css";?></style>
    
    <h2 style="text-align:center;">Your Cart</h2>
    <div class="container">
        <br><br>
      <table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">Author</th> -->
      <th scope="col">Image</th>
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
         <td><?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($fetch_cart['image']) .'" width="100px" height="150px" />'?>
        </td>
         <td><?php echo $fetch_cart['title'];?></td>
         <td><?php echo $fetch_cart['price'];?></td>
         <td><?php echo $fetch_cart['quantity']; ?></td>
         <td>R <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
         <td> 
         <button class="btn-button"><a href="removeCart.php?removeItemId='<?php echo $fetch_users['cartId'];?>'" class="text-light" style="text-decoration:none;">Remove</a></button>
        </td>
         </tr>
   <?php 
   $grand_total += $sub_total;
    }
    }
    else{
      echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
    }
    ?>
  </tbody>
</table>
 </div>
</body>
</html>