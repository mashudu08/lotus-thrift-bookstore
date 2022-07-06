<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php
      include 'db-connect.php';  //db connection 
      session_start();
      $user_id = $_SESSION['userId'];
      if(isset($_POST['add_to_cart'])){
        $bookId = mysqli_real_escape_string($dbconnect, $_POST['bookId']);
        $author = mysqli_real_escape_string($dbconnect, $_POST['author']);
        $book_title = mysqli_real_escape_string($dbconnect, $_POST['title']);
        $book_price =  mysqli_real_escape_string($dbconnect, $_POST['price']);
        $book_quantity =  mysqli_real_escape_string($dbconnect,$_POST['quantity']);
    
        $select_cart = mysqli_query($dbconnect, "INSERT INTO `cart`(bookId, userId, author, title, price, quantity) 
        VALUES('$bookId', '$user_id', '$author', '$book_title', '$book_price', '$book_quantity')") ;

        if($select_cart){
        echo "<script> alert('product already added to cart!') </script>";
          header("Location: cart-page.php");
       }else{
        die(mysqli_error($dbconnect));
      } 
    };
      unset($_POST['add_to_cart']);
      ?>
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
                                    <form method="post" action="shopBooks-page.php" >
                                    <?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($book['image']) .'" width="280px" height="330px" />'?>
                                        <input class="desc" hidden name="bookId" value="<?php echo $book['bookId'] ?>">
                                        <p class="desc"><b><?php echo $book['author']; ?></b></p>
                                        <input class="desc" hidden name="author" value="<?php echo $book['author'] ?>">
                                        <p class="desc"><b><?php echo $book['title'];?></b></p>
                                        <input class="desc" hidden name="title" value="<?php echo $book['title'] ?>">
                                        <p class="desc">R<?php echo $book['price']; ?></p>
                                        <input class="desc" hidden name="price" value="<?php echo $book['price'] ?>">
                                        <input type="number" min="1" max="1" name="quantity" value="1" style="text-align: center;">
                                        <button class="add_button" name="add_to_cart" value="add_to_cart" type="submit">Add to cart
                                        </button>
                                    </form>
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
        <br><br>
    <?php include 'footer.php'; ?>
</body>
</html>