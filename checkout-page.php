<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php 
session_start();
include 'db-connect.php';

if(isset($_POST['submit'])){
    $address1 = mysqli_real_escape_string($dbconnect, $_POST['address1']);
    $address2 = mysqli_real_escape_string($dbconnect, $_POST['address2']);
    $suburb = mysqli_real_escape_string($dbconnect, $_POST['suburb']);
    $city = mysqli_real_escape_string($dbconnect, $_POST['city']);
    $province = mysqli_real_escape_string($dbconnect, $_POST['province']);
    $postalcode = mysqli_real_escape_string($dbconnect, $_POST['postal_code']);
    $user_id = $_SESSION['userId'];

    $delivery_details =  mysqli_query($dbconnect, "INSERT INTO `delivery_details` (userId, address1, address2, suburb, city, province, postal_code)
    VALUES('$user_id', '$address1', '$address2', '$suburb', '$city', '$province', '$postal_code')") ;

    if($delivery_details){
    echo "<script>
      alert('Order place successfully!');
     </script>";
    }
    else{
      die(mysqli_error($dbconnect));
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
    <title>Checkout</title>
</head>
    <body>
        <?php include 'header.php'; ?> 
        <h2 style="text-align:center;" class="header-title" >Delivery Details</h2>

<div class="checkout">
        <form class="align-items-center mt-5" method="post">
  <div class="form-row" >
  </div>
  <div class="form-group mb-3 w-5">
    <label for="address1">Address</label>
    <input type="text" class="form-control" id="address1" placeholder="1234 Main St">
  </div>
  <div class="form-group mb-3 w-5">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row mb-3 w-5">
    <div class="form-group col-md-6  mb-3 w-5">
      <label for="suburb">Suburb</label>
      <input type="text" class="form-control" id="suburb">
    </div>
  <div class="form-row mb-3 w-5">
    <div class="form-group col-md-6  mb-3 w-5">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city">
    </div>
    <div class="form-group col-md-4  mb-3 w-5">
      <label for="province">Province</label>
      <select id="province" class="form-control">
        <option selected>Gauteng</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="postal_code">Postal Code</label>
      <input type="text" class="form-control" id="postal_code">
    </div>
  </div>
  <button type="submit" class="btn-button mb-5 w-5">Place Order</button>
</form>
</div>        
<?php include 'footer.php'; ?>
</body>
</html>