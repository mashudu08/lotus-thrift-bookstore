<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
    //  when form is submitted, check if user already exists in the database 
    //create a user session 
    //redirect users to home page
    ?>

    <form class="form" action="" method="post">
        <h1 class="login-title">Login</h1>
        <label>Username</label>
        <input type="text" class="login-input" name="Username" placeholder="Username" required/> <br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="Password" placeholder="Password" required/><br><br>
        <input type="submit" class="login-button" name="Login" value="Login" />
        <p class="link"><a href="register.php">Register</a></p>
    </form>
</body>
</html>