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
                                    <?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($book['image']) .'" width="300px" height="350px" />'?>
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
                         

                        <!-- <td>
                            <div class="books">
                                <img src="img/thumbnail/books3.jpg">
                                <p class="desc"><b>Information Technology Essentails</b></p>
                                <p>R450.80</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books4.jpg">
                                <p class="desc"><b>Security Engineering</b></p>
                                <p>R620.58</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books5.png">
                                <p class="desc"><b>Practical Cryptography for Developers</b></p>
                                <p>R225.90</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books3.jpg">
                                <p class="desc"><b>Information Technology Essentails</b></p>
                                <p>R450.80</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books4.jpg">
                                <p class="desc"><b>Security Engineering</b></p>
                                <p>R620.58</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books5.png">
                                <p class="desc"><b>Practical Cryptography for Developers</b></p>
                                <p>R225.90</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books6.jpg">
                                <p class="desc"><b>Python Django Web Development</b></p>
                                <p>R320.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books7.jpg">
                                <p class="desc"><b>Beginning PHP and MySQL</b></p>
                                <p>R320.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books8.jpg">
                                <p class="desc"><b>PHP Programming with MySQL</b></p>
                                <p>R450.50</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books9.jfif">
                                <p class="desc"><b>Business</b></p>
                                <p>R370.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books10.png">
                                <p class="desc"><b>Global Business Management by S. Dunung</b></p>
                                <p>R396.50</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books11.jpg">
                                <p class="desc"><b>Teaching in the University by D. Westfall-Rudd.....</b></p>
                                <p>R410.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books12.jpg">
                                <p class="desc"><b>Human Psychology by Dr. S. Kaur</b></p>
                                <p>R456.95</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books13.jpg">
                                <p class="desc"><b>Counselling Psychology by D. Murphy</b></p>
                                <p>R395.60</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books14.jpg">
                                <p class="desc"><b>Understanding Art</b></p>
                                <p>R300.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books15.jpg">
                                <h3>Discovering Art History by G. Broomer</h3>
                                <p>R265.45</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books17.png">
                                <h3>World History</h3>
                                <p>R180.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books20.jpg">
                                <h3>Music by J. Gienow-Hecht</h3>
                                <p>R395.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr> -->
                </table>
            </center>
        </div>  
    <?php include 'footer.php'; ?>
</body>
</html>