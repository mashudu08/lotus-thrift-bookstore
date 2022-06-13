<!-- ST10115884 Mashudu Luvhengo 
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
    //  when form is submitted, check if user already exists in the database 
    //create a user session 
    //redirect users to home page
    include 'db-connect.php';
    session_start();
    if(isset($POST['Login'])){
        $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $pass = mysqli_real_escape_string($dbconnect, md5($_POST['password']));
         
        $select_user = mysqli_query($dbconnect, "SELECT * FROM `admin` WHERE admin_username = '$username' AND admin_password = '$pass'");

        if(mysqli_num_rows($select_users) > 0){
            $row = mysqli_fetch_assoc($select_users);
            if($row['userId'] == 1){

                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['admin_password'] = $row['password'];
                $_SESSION['adminId'] = $row['id'];
                header('location:admin-page.php');
             }
       
          }else{
             $message[] = 'incorrect email or password!';
          }
       
        }
    
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/style.css"; ?> </style>
    <title>Admin Login</title>
</head>
<body>
    <form class="form" action="" method="post">
        <h1 class="login-title">Admin Login</h1>
        <label>Username</label>
        <input type="text" class="login-input" name="Username" placeholder="Username" required/> <br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="Password" placeholder="Password" required/><br><br>
        <input type="submit" class="login-button" name="Login" value="Login" />
    </form>
</body>
</html>