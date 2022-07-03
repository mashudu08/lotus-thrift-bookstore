<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage
------------------
References
------------------
CodeXWorld. 7 December 2021.[Online]. Store and Retrieve Image from MySQL Database using PHP. 
Available on: https://www.codexworld.com/store-retrieve-image-from-database-mysql-php/ . Accessed: 13 June 2022
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Portal</title>
</head>
<body>
    <?php include 'admin-header.php'; ?>

    <div class="container">
        <div class="container-fluid pb-3">
    <div class="d-grid gap-3" style="grid-template-rows: 1fr 2fr; height:400px">  
      <div class="bg-light border rounded-3">
          <h3 style="font-weight: bold; text-align: center; padding: 10px 0px 0px;">Student users</h3> 
        
          <br>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Student Number</th>
      <th scope="col">Username</th>
      <th scope="col">Verify</th>
      <th scope="col">Edit user</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      // VIEW , VERIFY AND DELETE USERS
    //  FETCHING USER DETAILS FROM DATABASE
        include 'db-connect.php';
         $select_users = mysqli_query($dbconnect, "SELECT * FROM `user`");
         while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <tr>
         <td> <?php echo $fetch_users['userId']; ?></td>
         <td> <?php echo $fetch_users['name']; ?></td>
         <td> <?php echo $fetch_users['stNumber']; ?></td>
         <td> <?php echo $fetch_users['username']; ?></td>
          <td>
            <button class="btn btn-success"><a href="verifyUser.php?verifyUsers='<?php echo $fetch_users['isVerified'];?>'" class="text-light">Verify</a></button>
          </td>
         <td>
          <button class="btn btn-danger"><a href="deleteUser.php?deleteUserId='<?php echo $fetch_users['userId']; ?>'" class="text-light">Delete User</a></button>
         </td>
         </tr>
       <?php
         };
        ?>
  </tbody>
</table>
      </div>

      <!-- ADD AND EDIT BOOKS -->
      <div class="bg-light border rounded-3">
      <h3 style="font-weight: bold; text-align: center; padding: 10px 0px 0px;">Books</h3> 
      <hr>
      <br>
         <h4 style="font-weight: bold; padding:0px 15px;">Add new book</h4>
         <br>
         <?php
        // Storing image in from database (CodeXWorld. 2021)
                if(isset($_POST['add-book'])){

                  $author = mysqli_real_escape_string($dbconnect, $_POST['author']);
                  $title = mysqli_real_escape_string($dbconnect, $_POST['title']);
                  $price = mysqli_real_escape_string($dbconnect,$_POST['price']);
                  $filename = $_FILES['image']['name'];
                  $tmp_name = $_FILES['image']['tmp_name'];
                  $folder = "./img/" . $filename;
                  $description = mysqli_real_escape_string($dbconnect, $_POST['description']);
                  $imgContent = addslashes(file_get_contents($tmp_name));

              $insert_book = mysqli_query($dbconnect, "INSERT INTO `books`(author,title, price, image, description) 
              VALUES('$author','$title', '$price', '$imgContent', '$description')") or die('query failed');
              
              if ($insert_book) {
                echo "<h3>  Image uploaded successfully!</h3>";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }
             }

             unset($_POST['add-book']);
          ?> 

  <form action="" method="post" enctype="multipart/form-data" style="padding: 10px;">
      <label>Author</label> 
      <input type="text" name="author" class="box" required><br><br>
      <label>Title</label> 
      <input type="text" name="title" class="box"required><br><br>
      <label>Price</label>
      <input type="text" name="price" class="box" required><br><br>
      <label>Image</label>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required><br><br>
      <label>Message</label> <br>
      <textarea class="text-input" name="description" placeholder="Enter book description" cols="60" rows="5" required></textarea><br><br>
      <input type="submit" value="add book" name="add-book" class="btn-button">
   </form>

  <br><br>
  <hr>
  <br>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Book ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>    
    </tr>
  </thead>
  <tbody>
  <h4 style="font-weight: bold; padding:0px 15px;">Added books</h4>
  <br>
    <?php 
        include 'db-connect.php';
         $select_users = mysqli_query($dbconnect, "SELECT * FROM `books`");
          // function deleteBook($bookId) {
          //   echo 'DELETEING BOOK';
          //   $delete_book =  mysqli_query($dbconnect, "DELETE FROM `books` WHERE bookId = '$bookId'");
          //   header('location:admin-page.php');
          // }

         while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <tr>
         <td> <?php echo $fetch_users['bookId']; ?></td>
         <td> <?php echo $fetch_users['author']; ?></td>
         <td> <?php echo $fetch_users['title']; ?></td>
         <td> <?php echo $fetch_users['price']; ?></td>
         <!-- retrieving image from database (CodeXWorld. 2021) -->
         <td> <?php echo '<img src="data:img/jpg;charset=utf8;base64, '. base64_encode($fetch_users['image']) .'" width="100px" height="150px" />'?>
         </td>
         
         <td> 
          <button class="btn btn-danger"><a href="deleteBook.php?deleteBookId='<?php echo $fetch_users['bookId']; ?>'" class="text-light">Delete</a></button>
          <button class="btn btn-primary"><a href="updateBook.php?updateBookId='<?php echo $fetch_users['bookId']; ?>'" class="text-light">Update</a></button>
        </td>
         </tr>
       <?php
         };
        ?>
  </tbody>
</table>
      </div>
    </div>

  </div>
    </div>
</body>
</html>