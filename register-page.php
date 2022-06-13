<!-- ST10115884 Mashudu Luvhengo 
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
    include("db-connect.php");
  
    $errorCount = 0;
    $name_error = $stNum_error = $username_error = $password_error = " ";
    $name = $stNum = $username = $password = " ";

    if(isset($_POST["Register"])){
        if(empty($_POST['Name'])){
            $name_error = "Please enter your name.";
            $errorCount++;
          }else{
            $name = $_POST['Name'];
          }
        
          if(empty($_POST['stNumber'])){
            $stNum_error = "Please enter a student number";
            $errorCount++;
          }else{
            $stNum = $_POST['stNumber'];
          }

          if(empty($_POST['Username'])){
            $username_error = "Please enter a username.";
            $errorCount++;
          }else{
            $username = $_POST['Username'];
          }

          if(empty($_POST['Password'])){
            $password_error = "Please enter a password.";
            $errorCount++;
          }else{  
            $password = PASSWORD_BCRYPT($_POST['Password']);
          }
   echo $errorCount;
      if($errorCount == 0){
      //Inseer users details to User table
      $sql = "INSERT INTO `user` ( name, stNumber, username, password)
              VALUES ('$name', '$stNum', '$username', '$password')";
      
  
        //executing the query
        $dbResult = mysqli_query($dbconnect, $sql);
      echo $dbResult;

        if ($dbResult === FALSE) {
          echo "Error inserting into the database: ". mysqli_connect_error();
        } else { 
         // session_start();
          $_SESSION['message'] = "User created successfully.";
          $_SESSION['msg_type'] = "success";
          header('location:login-page.php');
        }
  
        $name = $stNum = $username = $password = "";
  
          //closing the connection
          mysqli_close($dbconnect);
         $dbconnect = FALSE;
      }
      unset($_POST["Register"]);
        
    }
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/style.css"; ?> </style>
    <title>Register</title>
</head>
<body>
    <form class="form" action="register-page.php" method="POST">
        <h1 class="login-title">Register</h1>
        <label>Name</label>
        <input type="text" class="login-input" name="Name" value="" required/><span><?=$name; ?></span><br><br>
        <label>ST Number</label>
        <input type="text" class="login-input" name="stNumber" value=""  required/><span><?=$stNum; ?></span><br><br>
        <label>Username</label>
        <input type="text" class="login-input" name="Username" value="" required/><span><?=$username; ?></span><br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="Password" value="" required/><span><?=$password; ?></span><br><br>
        <!-- <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select> <br><br> -->
        <input type="submit" class="login-button" name="Register" value="Register" />
    </form>
    
    
</body>
</html>