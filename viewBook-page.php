<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css style link -->
    <style><?php include "css/style.css"; ?> </style>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>Book</title>
</head>
    <body>
        <?php include 'header.php'; ?>
        <style><?php include "css/viewBookStyles.css";?></style>
            <div class="pic">
                <img src="img/thumbnail/books19.jpg" alt="">
            </div>
            <div class="details">
                <p class="author"><b>Author</b></p>
                <p>Book name</p>
                <p>price of the book</p>
                <p>description</p>
                <button class="add_button" name="Add">Add to Cart</button>
            </div>
        <?php include 'footer.php'; ?>
    </body>
</html>