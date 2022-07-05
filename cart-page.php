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
    <title>Cart</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <style><?php include "css/cartStyles.css";?></style>
    
    <section class="cart">
        <h1 class="title">Your Cart</h1>
        <div class="box-container">
        <br><br>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      
    </tr>
  </thead>
  <tbody>
        <tr>
         <td> </td>
         <td> </td>
         <td></td>
         <td> </td>
         <td> <button type="submit" name="Edit" class="btn btn-danger">Remove</button>
    
        </td>
         </tr>
  </tbody>
</table>
          
      </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>