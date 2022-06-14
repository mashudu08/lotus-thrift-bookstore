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

     <!-- contact form styling using Bootstrap (Bootstrap. 2022) -->
<div class="contact">
    <form class="form" action="" method="post">
        <h1 style="text-align:center;" class="header-title" >Contact</h1>
        <h3 style="text-align:center;" >Send us a message on book enquiries</h3><br>
        <label>Name</label>
        <input type="text" class="text-input" name="Name" placeholder="Name" required/> <br><br>
        <label>Email</label>
        <input type="email" class="text-input" name="Email" placeholder="Email" required/><br><br>
        <label>Message</label> <br>
        <textarea class="text-input" name="Message" placeholder="Message" cols="30" rows="10" required></textarea><br><br>
        <input type="submit" class="btn-button" name="Send" value="Send" />
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>