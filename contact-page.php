<!-- ST10115884 Mashudu Luvhengo 
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
Bootstrap. 2022. Forms. [online]. Available on: https://getbootstrap.com/docs/5.2/forms/overview/ .
Accessed: 25 May 2022
-->
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
    <?php
     //database connections
    ?>
     <!-- contact form styling using Bootstrap -->
<section class="contact">
    <div class="row mb-3">
    <form class="form" action="" method="post">
        <h1 class="header-title">Contact</h1>
        <h3>Send us a message on book enquiries</h3>
        <label>Name</label>
        <input type="text" class="text-input" name="Name" placeholder="Name" required/> <br><br>
        <label>Email</label>
        <input type="email" class="text-input" name="Email" placeholder="Email" required/><br><br>
        <label>Message</label> <br><br>
        <textarea class="text-input" name="Message" placeholder="Message" cols="30" rows="10" required></textarea><br><br>
        <input type="submit" class="btn-button" name="Send" value="Send" />
    </form>
    </div>
</section>
<?php include 'footer.php'; ?>
</body>
</html>