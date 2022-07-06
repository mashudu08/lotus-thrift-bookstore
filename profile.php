<?php
    include 'db-connect.php';
    session_start();
    $userId = $_SESSION['userId'];
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
    <title>Profile</title>
</head>
<body>
    <?php include ('header.php'); ?>
    <h2 style="text-align:center;">User Profile </h2>
     <br><br>
     <div class="contact">
        <h4>Order History</h4> 
        <br>
        <?php
        $select_books = mysqli_query($dbconnect, "SELECT * FROM `cart` WHERE userId = '$userId'");
                while($fetch_order = mysqli_fetch_assoc($select_books)){
        ?>
                Order ID: <?php echo $fetch_order['cartId']; ?><br>
                User ID: <?php echo $userId;?><br>
        <h4>Book details:</h4>
                <?php echo 'Author: '. $fetch_order['author'] .' <br> '. 'Title: '.$fetch_order['title'] .'<br> '.
                'Price: R'.$fetch_order['price'] .'<br> '.'Quantity: '. $fetch_order['quantity']; ?> 
                <br><br>
         <?php 
            };
         ?>
        <h4>Delivery details:</h4> 
        <?php 
        $select_delivery = mysqli_query($dbconnect, "SELECT * FROM `delivery_details` WHERE userId = '$userId'");
            while($fetch_order = mysqli_fetch_assoc($select_delivery)){
                echo 'Street: '.$fetch_order['address1'] . $fetch_order['address2'] .'<br> '. 'Suburb: '.
                $fetch_order['suburb'] .'<br> '.'City: '. $fetch_order['city'].' <br> '. 'Province: '.
                $fetch_order['province'] .'<br> '. 'Postal code: '.$fetch_order['postal_code'] .'<br><br>';
            }
        ?>
     </div>
        <?php include ('footer.php'); ?>
</body>
</html>