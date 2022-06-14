<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
TextbookTrader. 2022. [Online]. Available on: https://textbooktrader.co.za/
-->
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
    <title>Lotus Thrift Bookstore</title>
</head>
    <body>
        <?php include 'header.php'; ?>
            <style><?php include "css/homeStyles.css";?></style>
            
            <div class="container">
                <h2><u>How it works</u></h2>
                <div class="divider">
                    <h3>SELL TEXTBOOKS </h3>
                    <p>Get cash for textbooks you no longer require.</p>
                    <p>Students from around the country will have access to view and buy your used textbooks.</p>
                    <p>Get paid within 5 days of selling your book directly into your bank account.</p>
                    <p>Our couriers will collect each book from your door at no additional cost to you.</p>
                </div>
                <div class="divider">
                    <h3>BUY TEXTBOOKS </h3>
                    <p>Easily find used textbooks listed by Students from around the country.</p>
                    <p>Receive books within 5 days from payment delivered free to your door</p>
                    <p>Books listed first are sold first.</p>
                    <p> </p>
                </div>
                <div class="contain_button">
                    <a href="shopBooks-page.php" class="work">Buy</a> 
                </div>
                |
                <div class="contain_button">
                    <a href="sell-page.php" class="work">Sell</a>
                </div>
            </div>
            
            <center>
                <table>
                    <caption><h1>Latest Arrival</h1></caption>
                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books22.jpg">
                                <p class="desc"><b>Music Theory for Beginners by P. Hoffman</b></p>
                                <p>R450.80</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books23.jpg">
                                <p class="desc"><b>The basics of filmmaking by B. Brown</b></p>
                                <p>R620.58</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books24.jpg">
                                <p class="desc"><b>Social Media Communications by B. Zhong</b></p>
                                <p>R225.90</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/novel4.jfif">
                                <p class="desc"><b>Born A Crime by T. Noah</b></p>
                                <p>R120.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/books26.jpg">
                                <p class="desc"><b>Hustle Harder, Hustle Smarter by C. Jackson</b></p>
                                <p>R320.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                        <td>
                            <div class="books">
                                <img src="img/thumbnail/novel6.jpg">
                                <p class="desc"><b>A South African nightmare RAPE by p. Godla</b></p>
                                <p>R160.00</p>
                                <button class="add_button" name="addToCart">Add to cart</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </center>
        <?php include 'footer.php'; ?>
    </body>
</html>