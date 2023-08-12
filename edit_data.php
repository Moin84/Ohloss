<?php
   @include 'config.php';
   session_start();

   if(isset($_POST['submit01'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $select = " SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){

         $delete = " DELETE FROM users WHERE email = '$email' ";
         $result = mysqli_query($conn, $delete);
         $error[] = 'Removed!';
      }
      else{
         $error[] = 'Not found!';
      }
      header('location: edit_data.php');
   };

   if(isset($_POST['submit02'])){
      $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
      $select = " SELECT * FROM posts WHERE post_id = '$post_id'";
      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){
         
         $delete = " DELETE FROM posts WHERE post_id = '$post_id' ";
         $result = mysqli_query($conn, $delete);
         $error[] = 'Removed!';
      }
      else{
         $error[] = 'Not found!';
      }
      header('location: edit_data.php');
   };

   
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin page | Ohloss</title>
      <link rel="stylesheet" href="CSS/edit_data.css">
   </head>
   <body>
      <div class="form-container">
         <form action="" method="post">
            <h3>Edit Data</h3>
            
            <h4>Remove user by Email</h4>
            <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
            ?>
            <input type="text" name="email" placeholder="Email">
            <input type="submit" name="submit01" value="Remove" class="form-btn">

            <h4>Remove post by Post ID</h4>
            <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
            ?>
            <input type="text" name="post_id" placeholder="Post ID">
            <input type="submit" name="submit02" value="Remove" class="form-btn">
            <p><a href="logout.php">Logout</a></p>
         </form>

      </div>

   </body>
</html>





