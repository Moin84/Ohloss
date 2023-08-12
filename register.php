<?php
   @include 'config.php';

   if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);

      $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";
      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){
         $error[] = 'User already exist!';
      }
      else{
         $insert = "INSERT INTO users(name, email, phone_no, password) VALUES('$name', '$email', '$phone_no', '$pass')";
         mysqli_query($conn, $insert);
         header('location: login.php');
      }
   };
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registration | Ohloss</title>
      <!-- custom css file link  -->
      <link rel="stylesheet" href="CSS/style.css">
   </head>
   <body>
      <div class="form-container">
         <form action="" method="post">
            <h3>Create Account</h3>
            <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
            ?>
            <input type="text" name="name" required placeholder="Full name">
            <input type="text" name="email" required placeholder="Email">
            <input type="text" name="phone_no" required placeholder="Phone number">
            <input type="password" name="password" required placeholder="Password">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
         </form> 
      </div>
   </body>
</html>