<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "css/style.css"; ?> </style>
    <title>Register</title>
</head>
<body>
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
            $username_error = "Please enter t a username.";
            $errorCount++;

            $username = $_POST['Username'];
          }

          if(empty($_POST['Password'])){
            $password_error = "Please enter a password.";
            $errorCount++;
          }else{
            $password = $_POST['Password'];
          }
    echo $errorCount;
      if($errorCount == 0){
      //Inseer users details to User table
      $sql = "INSERT INTO `user` ( name, stNumber, username, password)
              VALUES ('$name', '$stNum', '$username', '$password')";
      
  
        //executing the query
        $dbResult = @mysqli_query($dbconnect, $sql);
        echo $dbResult;

        if ($dbResult === FALSE) {
          echo "Error inserting into the database: ". mysqli_connect_error();
        } else { 
         // session_start();
          $_SESSION['message'] = "User created successfully. Please wait for registration approval.";
          $_SESSION['msg_type'] = "success";
          header('location:login-page.php');
        }
  
        $name = $stNum = $username = $password = "";
  
        //closing the connection
        @mysqli_close($dbconnect);
        $dbconnect = FALSE;
      }
      unset($_POST["Register"]);
        
    }
    ?>

    <style><?php include "css/registerStyles.css";?></style>
    <h1 class="login-title">Registration Form</h1>
    <div class="formMain">
      <form class="form" action="register-page.php" method="POST">
          <label class="label">Name</label><br>
          <input type="text" class="login-input" name="Name" value="" required/><span><?=$name; ?></span><br><br>
          <label class="label">Sudent Number</label><br>
          <input type="text" class="login-input" name="stNumber" value=""  required/><span><?=$stNum; ?></span><br><br>
          <label class="label">Username</label><br>
          <input type="text" class="login-input" name="Username" value="" required/><span><?=$username; ?></span><br><br>
          <label class="label">Password</label><br>
          <input type="password" class="login-input" name="Password" value="" /><span><?=$password; ?></span><br><br>
          <input type="submit" class="login-button" name="Register" value="Register" />
      </form>
    </div>
    
</body>
</html>