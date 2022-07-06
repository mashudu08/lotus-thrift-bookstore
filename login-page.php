<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
    include 'db-connect.php';
    session_start();
    if(isset($_POST['Login'])){
        $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $pass = mysqli_real_escape_string($dbconnect, $_POST['password']);
        $select_user = mysqli_query($dbconnect, "SELECT * FROM `user` WHERE username = '$username' ");
            if(mysqli_num_rows($select_user) > 0){
                $row = mysqli_fetch_assoc($select_user);
        
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['isRefreshed'] = false;
                    // checking if user is verfied
                    if (password_verify($pass ,$row['password'])) {
                        $_SESSION['password'] = $row['password'];
                        $isVerified =  $row['isVerified'];
                        if ($isVerified == 1) {
                            header('location:home-page.php');
                        } else {
                            echo 
                            "<script> alert('Waiting to be verified')</script>";
                        }
                    }                        
                  }else{
                    echo  "<script> alert('Waiting to be verified')</script>";
                  }                       
        }    
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/loginStyles.css"; ?> 
     </style>
    <title>Login</title>
</head>
<body style=" background-image: url('img/books.jpeg');  background-position: center; background-size: cover;">
<button class="admin-login-btn" style="margin-left: 1100px;">
    <a href="admin-login.php">Admin Login</a>
    </button>
    <div class="main">
    <form class="form" action="login-page.php" method="post">
        <h1 class="login-title">Login</h1>
        <label>Username</label>
        <input type="text" class="login-input" name="username" required/> <br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="password" required/><br><br>
        <input type="submit" class="login-button" name="Login" value="Login" />
        <p class="link">Don't have an account?  <a href="register-page.php" style="color: #fff;" >  Register</a></p>
    </form>
    </div>
</body>
</html>
