<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
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
         
        $select_user = mysqli_query($dbconnect, "SELECT * FROM `user` WHERE username = '$username' AND password = '$pass'");

        if(mysqli_num_rows($select_users) > 0){
            $row = mysqli_fetch_assoc($select_users);
             $_SESSION['username'] = $row['username'];
             $_SESSION['password'] = $row['password'];
             $_SESSION['userId'] = $row['id'];
             header('location:home-page.php');
            // if($row['user_type'] == 'admin'){

            //     $_SESSION['admin_username'] = $row['username'];
            //     $_SESSION['admin_password'] = $row['password'];
            //     $_SESSION['adminId'] = $row['id'];
            //     header('location:admin-page.php');
       
            //  }elseif($row[$username] == 'user'){
       
            //     $_SESSION['username'] = $row['username'];
            //     $_SESSION['password'] = $row['password'];
            //     $_SESSION['userId'] = $row['id'];
            //     header('location:home-page.php');
       
            //  }
       
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
    <title>Login</title>
</head>
<body>
<<<<<<< HEAD
    <div class="admin-login-btn">
    <a href="admin-login.php">Admin Login</a>
    </div>

    <form class="form" action="" method="post">
        <h1 class="login-title">Login</h1>
        <label>Username</label>
        <input type="text" class="login-input" name="Username" placeholder="Username" required/> <br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="Password" placeholder="Password" required/><br><br>
        <input type="submit" class="login-button" name="Login" value="Login" />
        <p class="link">Don't have an account?  <a href="register-page.php">  Register</a></p>
    </form>
=======
    <style><?php include "css/loginStyles.css"; ?> </style>
    <?php
    //  when form is submitted, check if user already exists in the database 
    //create a user session 
    //redirect users to home page
    ?>
    <div class="main">
        <form class="form" action="" method="post">
            <h1 class="login-title">Login</h1>
            <label>Username</label>
            <input type="text" class="login-input" name="Username" placeholder="Username" required/> <br><br>
            <label>Password</label>
            <input type="password" class="login-input2" name="Password" placeholder="Password" required/><br><br>
            <p class="link">Don't have an account?  <a href="register-page.php" class="link2"><u>  Register</u></a></p>
            <input type="submit" class="login-button" name="Login" value="Login" />
        </form>
    </div>
>>>>>>> c20aa1ab311a9dd1987ce9c846b6473977974458
</body>
</html>