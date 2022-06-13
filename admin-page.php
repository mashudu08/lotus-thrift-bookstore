<!-- ST10115884 Mashudu Luvhengo 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Portal</title>
</head>
<body>
    <?php include 'admin-header.php'; ?>

    <div class="container">
        <h1>Dashboard</h1>
        <div class="container-fluid pb-3">
    <div class="d-grid gap-3" style="grid-template-rows: 1fr 2fr; height:500px">
    <!-- VIEW , VERIFY AND DELETE USERS -->
      <div class="bg-light border rounded-3">
          <h3 style="text-align: center;">Student users</h3> 
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
         <td> <button type="submit" name="update" class="btn btn-success">Verify</button>
          <!-- <span style="color: php 
         if($fetch_users['isVerfied'] == 0 ){ echo 'var(--orange)'; } ?>"><hp echo $fetch_users['user_type']; ?></span> --> </td>
          <!-- if isVerified === 0{
           $select_isVerified = mysqli_query($dbconnect, "UPDATE isVerified FRO `user` WHERE userId = '$userId'") or die('query failed');
            
          }  -->

         <td><a href="admin-page.php?delete=<?php echo $fetch_users['userId']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a></td>
         </tr>
       <?php
         };
        ?>
  </tbody>
</table>

        <br><br><br><br><br><br><br><br><br><br>
      </div>

      <!-- ADD AND EDIT BOOKS -->
      <div class="bg-light border rounded-3">
      <h3 style="text-align: center;">Books</h3> 
         <p>Add new book</p>
         <?php
              include 'db-connect.php';
                // session_start();

              //  $admin_id = $_SESSION['adminId'];

              //   if(!isset($admin_id)){
              //   header('location:admin-login.php');
              //   };

                if(isset($_POST['add-book'])){

                  $author = mysqli_real_escape_string($dbconnect, $_POST['author']);
                  $title = mysqli_real_escape_string($dbconnect, $_POST['title']);
                  $price = mysqli_real_escape_string($dbconnect,$_POST['price']);
                  $fileName = basename($_FILES['image']['name']);
                  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                  $image_tmp_name = $_FILES['image']['tmp_name'];
                  $imgContent = addslashes(file_get_contents($image_tmp_name));
                  $description = mysqli_real_escape_string($dbconnect, $_POST['description']);

              //  $select_product_name = mysqli_query($dbconnect, "INSERT INTO books");

              if(mysqli_num_rows($insert_book) > 0){
                  $message[] = 'product name already added';
              }else{
                  $insert_book = mysqli_query($dbconnect, "INSERT INTO `books`(author,title, price, image, description) VALUES('$author','$title', '$price', '$imgContent', '$description')") or die('query failed');

                  if($insert_book){
                        // move_uploaded_file($image_tmp_name);
                        $message[] = 'File uploaded successfully!';
                    
                  }else{
                    $message[] = 'File upload failed, please try again.';
                  }
              }
             }
          ?> 

 <form action="" method="post" enctype="multipart/form-data" style="padding: 10px;">
 <!-- <div class="row mb-2"> -->
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
      <!-- </div> -->
   </form>

  <br><br>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Book ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <p>Added books</p>
    <?php 
        include 'db-connect.php';
         $select_users = mysqli_query($dbconnect, "SELECT * FROM `books`");
         while($fetch_users = mysqli_fetch_assoc($select_users)){
        ?>
        <tr>
         <td> <?php echo $fetch_users['bookId']; ?></td>
         <td> <?php echo $fetch_users['author']; ?></td>
         <td> <?php echo $fetch_users['title']; ?></td>
         <td> <?php echo $fetch_users['price']; ?></td>
         </tr>
       <?php
         };
        ?>
  </tbody>
</table>
        <br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>

  </div>
    </div>
</body>
</html>