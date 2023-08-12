<?php
   @include 'config.php';
   session_start();

   if(isset($_POST['submit'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);

      if($email == 'admin' && $pass == 'admin123'){
         $_SESSION['email'] = $email;
         header('Location: edit_data.php');
      }
      else{
         $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";
         $result = mysqli_query($conn, $select);
         
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $_SESSION['email'] = $row['email'];
            header('location: home.php');
         }
         else{
            $error[] = 'Incorrect Submition, try again!';
         }
      }
   };
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login | Ohloss</title>
      <link rel="stylesheet" href="CSS/style.css">
   </head>
   <body>
      <div class="form-container">
         <form action="" method="post">
            <h3>Log in</h3>
            <?php
               if(isset($error)){
                  foreach($error as $error){
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               };
            ?>
            <input type="text" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
         </form>

      </div>

   </body>
</html>
