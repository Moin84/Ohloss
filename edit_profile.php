<?php
    @include 'config.php';
    session_start();
?>

<?php
   @include 'config.php';
   $currentSession = $_SESSION["email"];
   
   if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);

      $select = " SELECT * FROM users WHERE email = '$email' ";
      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0 && $email != $currentSession){
         $error[] = 'Email already exist!';
      }
      else{
         $update = " UPDATE users SET name = '$name', email = '$email', phone_no = '$phone_no', password = '$pass' WHERE email = '$currentSession' ";
         mysqli_query($conn, $update);
         header('location: profile.php');
      }
   };
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit profile | Ohloss</title>
      <!-- custom css file link  -->
      <link rel="stylesheet" href="CSS/style.css">
   </head>
   <body>
      <div class="form-container">
         <form action="" method="post">
            <h3>Edit your profile</h3>
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
            <input type="submit" name="submit" value="Change" class="form-btn">
         </form> 
      </div>
   </body>
</html>