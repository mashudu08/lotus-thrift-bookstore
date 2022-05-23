<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
    //  when form is submitted, insert values into database 
    // redirect to login page

    ?>

    <form class="form" action="" method="post">
        <h1 class="login-title">Register</h1>
        <label>Name</label>
        <input type="text" class="login-input" name="Name" placeholder="Name" required/><br><br>
        <label>ST Number</label>
        <input type="text" class="login-input" name="ST Number" placeholder="ST Number" required/><br><br>
        <label>Username</label>
        <input type="text" class="login-input" name="Username" placeholder="Username" required/><br><br>
        <label>Password</label>
        <input type="password" class="login-input" name="Password" placeholder="Password" required/><br><br>
        <input type="submit" class="login-button" name="Register" value="Register" />
    </form>
</body>
</html>