<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
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

    if(isset($_POST['send'])){
        $name = mysqli_real_escape_string($dbconnect, $_POST['name']);
        $email = mysqli_real_escape_string($dbconnect,$_POST['email']);
        $msg =  mysqli_real_escape_string($dbconnect,$_POST['message']);
        $user_id = $_SESSION['userId'];

     $message = mysqli_query($dbconnect, "INSERT INTO `contact`(userId, name, email, message) VALUES( '$user_id','$name', '$email', '$msg')");
     if($message){
        echo "<script>
          alert('Message sent successfully');
      </script>" ;
     }else{
        die(mysqli_error($dbconnect));
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
     <!-- contact form styling using Bootstrap (Bootstrap. 2022) -->
     <h2 style="text-align:center;" class="header-title" >Contact</h2>
     <p style="text-align:center;  margin-bottom: 20px;" >Send us a message about book enquiries</p>
<div class="contact">
    <form class="form" action="" method="post">
        <label>Name</label>
        <input type="text" class="text-input" name="name" placeholder="Name" required/> <br><br>
        <label>Email</label>
        <input type="email" class="text-input" name="email" placeholder="Email" required/><br><br>
        <label>Message</label> <br>
        <textarea class="text-input" name="message" placeholder="Message" cols="70" rows="10" required></textarea><br><br>
        <input type="submit" class="btn-button" name="send" value="send" />
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>