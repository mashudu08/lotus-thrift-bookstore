<!-- ST10115884 Mashudu Luvhengo 
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
Bootstrap. 2022. Forms. [online]. Available on: https://getbootstrap.com/docs/5.2/forms/overview/ .
Accessed: 25 May 2022
-->

<?php
     include 'db-connect.php';

     session_start();

     $user_id = $_SESSION['userId'];

     if(!isset($user_id)){
         header('location:login-page.php');
     }

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($dbconnect, $_POST['name']);
        $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
        $msg = mysqli_real_escape_string($dbconnect, $_POST['message']);
    
    $select_message = mysqli_query($dbconnect, "SELECT * FROM `connect` WHERE name = '$name' AND email = '$email' AND message = '$msg'");

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
     }else{
        mysqli_query($conn, "INSERT INTO `message`(userId, name, email, message) VALUES('$user_id', '$name', '$email', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
     }
}
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css style link -->
    <style><?php include "css/style.css"; ?> </style>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>Contact</title>
</head>
<body>
    <?php include 'header.php'; ?>

     <!-- contact form styling using Bootstrap -->
     <div class="main">
<section class="contact">
    <div class="row mb-3">
    <form class="form" action="" method="post">
        <h1 class="header-title">Contact</h1>
        <h3>Send us a message on book enquiries</h3>
        <label>Name</label>
        <input type="text" class="text-input" name="Name" placeholder="Name" required/> <br><br>
        <label>Email</label>
        <input type="email" class="text-input" name="Email" placeholder="Email" required/><br><br>
        <label>Message</label> <br><br>
        <textarea class="text-input" name="Message" placeholder="Message" cols="30" rows="10" required></textarea><br><br>
        <input type="submit" class="btn-button" name="Send" value="Send" />
    </form>
    </div>
</section>
</div>
<?php include 'footer.php'; ?>
</body>
</html>