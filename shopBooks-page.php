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
    <title>Shop</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <style><?php include "css/homeStyles.css";?></style>
        <div class="bookShop">
            <center>
                <table>
                    <caption><h2>Shop Books</h2></caption>

                    <?php 
                        include 'db-connect.php'; // Get db instance
                        $books = array(); // Array  to hold all books read from db

                        $books = mysqli_query($dbconnect, "SELECT * FROM `books`"); // Query to db for getting all books

                        $books_arr = mysqli_fetch_all($books, MYSQLI_ASSOC); // Convert all read bbooks into assocc array

                    ?>

                        <?php 
                        $index = 0; // Flag used to create table rows
                        foreach ($books_arr as $book) : // Foreach used to cycle through array
                            // This if statement creates the initial table row
                                if ($index == 0) { 
                                    ?> 
                                    <tr>
                                    <?php    
                                }
                                ?>
                                
                                 <!-- Display the book details -->
                                <td>
                                    <div class="books">
                                    <?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($book['image']) .'" width="280px" height="330px" />'?>
                                        <p class="desc"><b><?php echo $book['author']; ?></b></p>
                                        <p class="desc">R<?php echo $book['price']; ?></p>
                                        <button class="add_button" name="addToCart">Add to cart</button>
                                    </div>
                                </td>

                            <!-- This condition  create the closing table row if three books have already been displayed -->
                            <?php if ($index == 2) {
                                ?> 
                                </tr>
                                    <?php   
                            }
                            ?>

                                <?php if ($index == 2) {
                                    $index = 0; // Set the flag back to initial state   
                                } 
                                
                                else {
                                    $index++; // Increment flag
                                }
                        endforeach // End foreach
                        ?>
                </table>
            </center>
        </div>  
    <?php include 'footer.php'; ?>
</body>
</html>