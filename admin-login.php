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
    if(isset($_POST['Login'])){
        $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $pass = mysqli_real_escape_string($dbconnect, ($_POST['password']));
         
        $select_user = mysqli_query($dbconnect, "SELECT * FROM `admin` WHERE admin_username = '$username' AND admin_password = '$pass'");

        if(mysqli_num_rows($select_user) > 0){
            $row = mysqli_fetch_assoc($select_user);
                    
               
                        $_SESSION['username'] = $row['admin_username'];
                        $_SESSION['password'] = $row['admin_password'];
                        header('location:admin-page.php');
       
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
        <!-- custom css style link -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
     *{
        font-family: 'Poppins', sans-serif;
     } 
     .button{
    color: #fff;
    background-color: #1B263B;
    border: #1B263B;
    border-radius: 30px;
    width: 120px;
    height: 30px;
     }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
    <!-- bootstrap styling -->
<div class="container"> 
    <div class="admin-login-form">
    <form class="form" action="" method="POST">
        <h1 class="text-dark  my-5">Admin Login</h1>
        <div class="mb-3 w-50 " >
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="username" required/>
    </div>
        <div class="mb-3 w-50">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password" required/>
        </div>
        <input type="submit" class="button"  name="Login" value="Login" />
    </form>
    </div>
</body>
</html>