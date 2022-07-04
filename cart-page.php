<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
      include 'db-connect.php';       //db connection 
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
      <!-- <th scope="col">Author</th> -->
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
   $cart = mysqli_query($dbconnect, "SELECT * FROM `cart`");
   while($fetch_cart = mysqli_fetch_assoc($cart)){
    ?>
        <tr>
         <td><?php echo $fetch_cart['title'];?></td>
         <td><?php echo $fetch_cart['price'];?></td>
         <td><?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($fetch_cart['image']) .'" width="100px" height="150px" />'?></td>
         <td> 
         <button class="btn-button"><a href="verifyUser.php?verifyUsers='<?php echo $fetch_users['isVerified'];?>'" class="text-light" style="text-decoration:none;">Remove</a></button>
        </td>
         </tr>
         <?php
         };
        ?>
  </tbody>
</table>
 </div>
</body>
</html>