<?php
    @include 'config.php';
    session_start();
    $currentSession = $_SESSION["email"];
    date_default_timezone_set('Asia/Dhaka');
    $currentDateTime = date('Y-m-d H:i:s');

    if(isset($_POST['submit'])){
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            while(1){
                $post_id = rand(10000,99999);

                $select = " SELECT * FROM posts WHERE post_id = '$post_id' ";
                $result = mysqli_query($conn, $select);

                if(mysqli_num_rows($result) > 0){
                    continue;
                }
                else{
                    $insert = "INSERT INTO posts(post_id, title, description, email, time)
                    VALUES('$post_id', '$title', '$description', '$currentSession', '$currentDateTime')";
                    mysqli_query($conn, $insert);
                    break;
                }
            }
            header('location: home.php');
    };
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Post work | Ohloss</title>
      <link rel="stylesheet" href="CSS/post_work.css">
   </head>
   <body>
        <div class="form-container">
            <form action="" method="post">
                <h3>Post work</h3>
                <input type="text" name="title" required placeholder="Title">
                <textarea rows="10" cols="10" name="description" required placeholder="Description"></textarea>
                <input type="submit" name="submit" value="Post" class="form-btn">
            </form>
        </div>
   </body>
</html>