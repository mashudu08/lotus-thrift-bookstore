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
          
      <!-- ADD AND EDIT BOOKS -->
      <div class="bg-light border rounded-3">
      <h3 style="text-align: center;">Update book</h3> 
      <?php
        // $id=$_GET['updateBookId'];
        // Storing image in from database (CodeXWorld. 2021)
                if(isset($_POST['submit'])){
                  $author = $_POST['author'];
                  $title = $_POST['title'];
                  $price = $_POST['price'];
                  $filename = $_FILES['image']['name'];
                  $tmp_name = $_FILES['image']['tmp_name'];
                  $folder = "./img/" . $filename;
                  $description = $_POST['description'];
                  $imgContent = addslashes(file_get_contents($tmp_name));

              $update_book = mysqli_query($dbconnect, "UPDATE `books` SET author='$author',title='$title', price=$price, image='$imgContent', description='$description'");
              
              if ($update_book) {
                echo "Updated successfully!";
            }
             else{
                die(mysqli_error($dbconnect));
            }
        }
            //  unset($_POST['add-book']);
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
      </div>
    </div>

  </div>
    </div>
</body>
</html>