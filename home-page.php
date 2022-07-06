<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
TextbookTrader. 2022. [Online]. Available on: https://textbooktrader.co.za/
-->
<?php 
include 'db-connect.php';
session_start(); 
    $username = $_SESSION['username'];
    $refreshed = $_SESSION['isRefreshed'];
    if (!$refreshed) {
        echo "<script>
              alert('Welcome back $username');
         </script>" ;

         $_SESSION['isRefreshed'] = true;
    }
include 'header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css style link -->
    <style><?php include "css/style.css"; ?> </style>
    <style><?php include "css/homeStyles.css";?></style>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <!-- custom js file link -->
    <script src="js/homeJs.js" defer></script>
    <title>Lotus Thrift Bookstore</title>
</head>
    <body>
        <script src="js/homeJs.js" defer></script>

            <div class="container">
                <h2>How it works</h2>
                <div class="divider">
                    <h3><u><b>Sell Textbooks</b></u></h3>
                    <p>Get cash for textbooks you no longer require.</p>
                    <p>Students from around the country will have access to view and buy your used textbooks.</p>
                    <p>Get paid within 5 days of selling your book directly into your bank account.</p>
                    <p>Our couriers will collect each book from your door at no additional cost to you.</p>
                </div>
                <div class="divider">
                    <h3><u><b>Buy Textbooks</b></u></h3>
                    <p>Easily find used textbooks listed by Students from around the country.</p>
                    <p>Receive books within 5 days from payment delivered free to your door</p>
                    <p>Books listed first are sold first.</p>
                    <p> </p>
                </div><br>
                <div class="contain_button">
                    <a href="shopBooks-page.php" class="work">Buy</a> 
                </div>
                |
                <div class="contain_button">
                    <a href="sell-page.php" class="work">Sell</a>
                </div>
                <br>
            </div>
            
    <center>
            <table>
                <caption><h1>Latest Arrival</h1></caption>
                <?php  
                    $books = array(); // Array  to hold all books read from db
                    $books = mysqli_query($dbconnect, "SELECT * FROM `books` LIMIT 6");
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
                                    <p class="desc"><b><?php echo $book['title'];?></b></p>
                                    <p class="desc">R<?php echo $book['price']; ?></p>
                                    <button class="add_button" name="addToCart"><a href="manageCart.php?cartItemId='<?php echo $book['bookId']; ?>'">Add to cart</button></a>
                                    </div>
                                </td>
                                <!-- This condition  create the closing table row if three books have already been displayed -->
                                <?php if ($index == 2) {
                                    ?> 
                                </tr>
                                <?php } ?>
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

            <script src="js/homeJs.js" defer></script>

            <!-- Code to preview books.-->
            <div class="books-preview">

                <div class="preview active" data-target="book1">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/books5.png">
                    <h3>S. Nakvoc</h3>
                    <p>Practical Cryptography for Developers</P>
                    <div class="price">R225.90</div>
                    <div class="buttons">
                        <a href="manageCart.php?cartItemId='<?php echo $book['bookId']; ?>'">Add to Cart</a>
                    </div>
                </div>

                <div class="preview" data-target="book2">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/books23.jpg">
                    <h3>B. Brown</h3>
                    <p>The basics of filmmaking</P>
                    <div class="price">R620.58</div>
                    <div class="buttons">
                        <a href="cart-page.php" class="addBook">Add to Cart</a>
                    </div>
                </div>

                <div class="preview" data-target="book3">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/books24.jpg">
                    <h3>B. Zhong</h3>
                    <p>Social Media Communications</P>
                    <div class="price">R225.90</div>
                    <div class="buttons">
                        <a href="cart-page.php" class="addBook">Add to Cart</a>
                    </div>
                </div>

                <div class="preview" data-target="book4">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/novel4.jfif">
                    <h3>T. Noah</h3>
                    <p>Born A Crime</P>
                    <div class="price">R120.00</div>
                    <div class="buttons">
                        <a href="cart-page.php" class="addBook">Add to Cart</a>
                    </div>
                </div>

                <div class="preview" data-target="book5">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/books26.jpg">
                    <h3>C. Jackson</h3>
                    <p>Hustle Harder, Hustle Smarter</P>
                    <div class="price">R320.00</div>
                    <div class="buttons">
                        <a href="cart-page.php" class="addBook">Add to Cart</a>
                    </div>
                </div>

                <div class="preview" data-target="book6">
                    <i class="fas fa-times"></i>
                    <img src="img/thumbnail/novel6.jpg">
                    <h3>P. Godla</h3>
                    <p>A South African nightmare RAPE</P>
                    <div class="price">R160.00</div>
                    <div class="buttons">
                        <a href="cart-page.php" class="addBook">Add to Cart</a>
                    </div>
                </div>
                
            </div>
        <?php include 'footer.php'; ?>
    </body>
</html>