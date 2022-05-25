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
    <title>Sell</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <?php
     // database connection
    ?>
     <!-- contact form styling using Bootstrap -->
<section class="sell-books">
    <form class="form" action="" method="post">
        <h1 class="header-title">Upload book</h1>
        <h3>Upload books you want to sell</h3>
        <label>Author</label>
        <input type="text" class="text-input" name="Author" placeholder="Author" required/> <br><br>
        
        <label>Title</label>
        <input type="text" class="text-input" name="Title" placeholder="Title" required/><br><br>

        <label>Price</label>
        <input type="email" class="text-input" name="Price" placeholder="Price" required/><br><br>

        <label>Upload image</label> &nbsp;<div id="upload" class="fa-solid fa-upload"></div> <br><br>

        <label>Description</label> <br><br>
        <textarea class="text-input" name="Description" placeholder="Book description" cols="30" rows="10" required></textarea><br><br>
        <input type="submit" class="btn-button" name="Upload" value="Upload" />
    </form>
</section>
<?php include 'footer.php'; ?>
</body>
</html>