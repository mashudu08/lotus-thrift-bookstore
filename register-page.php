<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage 
------------------
References
------------------
GeeksforGeeks. 31 July 2021. [Online]. How to encrypt and decrypt passwords using PHP ?.
 Available on: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-passwords-using-php/ .Accessed: 12 June 2022
-->
<?php
    include("db-connect.php");
  
    $errorCount = 0;
    $name_error = $stNum_error = $username_error = $password_error = " ";
    $name = $stNum = $username = $password = " ";

    if(isset($_POST["register"])){
        if(empty($_POST['name'])){
            $name_error = "Please enter your name.";
            $errorCount++;
          }else{
            $name = $_POST['name'];
          }
        
          if(empty($_POST['stNumber'])){
            $stNum_error = "Please enter a student number";
            $errorCount++;
          }else{
            $stNum = $_POST['stNumber'];
          }

          if(empty($_POST['username'])){
            $username_error = "Please enter a username.";
            $errorCount++;
          }else{
            $username = $_POST['username'];
          }

          if(empty($_POST['password'])){
            $password_error = "Please enter a password.";
            $errorCount++;
          }else{  
            $password = $_POST['password'];
          }

    // Hashing password (GeeksforGeeks.2021)
          $hash_password = password_hash($password, PASSWORD_BCRYPT);
    echo $errorCount;
      if($errorCount == 0){
      //Inserting users details to User table
      $sql = "INSERT INTO `user` ( name, stNumber, username, password)
              VALUES ('$name', '$stNum', '$username', '$hash_password')";
      
        //executing the query
        $dbResult = @mysqli_query($dbconnect, $sql);
        // echo $dbResult;

        if ($dbResult === FALSE) {
          echo "<script> alert('Error inserting into the database: ' mysqli_connect_error()');
          </script>";
        } else { 
          echo "<script> alert('User created successfully!'); </script>";
          $_SESSION['msg_type'] = "success";
          header('location:login-page.php');
        }
        //closing the connection
        mysqli_close($dbconnect);
        $dbconnect = FALSE;
      }
      unset($_POST["Register"]);  
    }
    ?>
  <style><?php include "css/registerStyles.css";?></style>
    <h1 class="login-title">Registration Form</h1>
    <div class="formMain">
      <form class="form" action="register-page.php" method="POST">
          <label class="label">Name</label>
          <input type="text" class="login-input" name="name" required/><span><?=$name; ?></span><br><br>
          <label class="label">ST Number</label>
          <input type="text" class="login-input" name="stNumber" required/><span><?=$stNum; ?></span><br><br>
          <label class="label">Username</label>
          <input type="text" class="login-input" name="username" required/><span><?=$username; ?></span><br><br>
          <label class="label">Password</label>
          <input type="password" class="login-input" name="password" required/><span><?=$password; ?></span><br><br>
          <input type="submit" class="login-button" name="register" value="Register" />
          <p class="link">Already have registered?  <a href="login-page.php" style="color: #fff;"> Login here</a></p>
      </form>
    </div>
</body>
</html>