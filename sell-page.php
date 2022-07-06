<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
Bootstrap. 2022. Forms. [online]. Available on: https://getbootstrap.com/docs/5.2/forms/overview/ .
Accessed: 25 May 2022
-->
  <!-- REQUEST TO SELL BOOKS -->
  <?php
    include "db-connect.php";
    session_start();
    
        // Storing image in database is from(CodeXWorld. 2021)
        if(isset($_POST['sell-request']))
        {
            $author = mysqli_real_escape_string($dbconnect,$_POST['author']);
            $title = mysqli_real_escape_string($dbconnect, $_POST['title']);
            $price = mysqli_real_escape_string($dbconnect,$_POST['price']);
            $filename = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $folder = "./img/" . $filename;
            $description = mysqli_real_escape_string($dbconnect,$_POST['description']);
            $imgContent = addslashes(file_get_contents($tmp_name));
            $username = $_SESSION['username'];

            $sell_request = mysqli_query($dbconnect, "INSERT INTO `sell`(author, title, price, image, description, username) 
            VALUES('$author','$title', '$price', '$imgContent', '$description', '$username')"); 
                
            if ($sell_request) 
            {
                echo "<script>
                alert('Book request submitted successfully!');
           </script>" ; "";
            } else 
            {
                echo "Failed to upload book!";
            }
        }
         unset($_POST['sell-request']);           
    ?>
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
     <!-- contact form styling using Bootstrap -->
    <h2 style="text-align:center;" class="header-title">Upload book</h2>
    <p style="text-align:center;">Upload books you want to sell</p><br>
<section class="sell-books">
    <form class="form" action="" enctype="multipart/form-data" method="post">
    
        <label>Author</label>
        <input type="text" class="text-input" name="author" placeholder="Author" required/> <br><br>
        <label>Title</label>
        <input type="text" class="text-input" name="title" placeholder="Title" required/><br><br>
            <label>Price</label>
            <input type="text" class="text-input" name="price" placeholder="Price" required/><br><br>
            <label>Image</label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required><br><br>
            <label>Description</label> <br><br>
            <textarea class="text-input" name="description" placeholder="Book description" cols="70" rows="10" required></textarea><br><br>
            <input type="submit" class="btn-button" name="sell-request" value="Submit Request" />
        </form>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>