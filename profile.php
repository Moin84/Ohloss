<?php
    @include 'config.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile | Ohloss</title>
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
            body {
                margin: auto;
                padding: 0px;
                overflow-x: hidden;
                background-repeat: repeat;
                font-family: 'Poppins', sans-serif;
                background: #eee;
                /* font-family: 'Inter', sans-serif; */
            }

            .header {
                overflow: hidden;
                background-color: #fff;
                padding: 15px 45px;
                margin-left: 350px;
                margin-right: 349px;
                margin-bottom: 0px;
                /* border-radius: 10px; */
                box-shadow: 0 0px 30px rgba(0,0,0,.1);
                position: sticky;
                top: 0;
                height: 275px;
            }
            .header a {
                float: left;
                color: crimson;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px; 
                line-height: 25px;
                border-radius: 4px;
            }
            .header h2 {
                float: center;
                color: crimson;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 30px; 
                line-height: 25px;
                border-radius: 4px;
                margin-top: 50px;
                margin-bottom: 15px;
            }
            .header h4 {
                float: center;
                color:#333;
                text-align: center;
                font-size: 16px;
                font-weight: normal;
                line-height: 1.5;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .header h4 span {
                font-weight: bold;
            }

            .header p {
                float: center;
                text-align: center;
                margin-top: 70px;
                /* margin-left: 470px; */
                font-size: 23px;
                color: black;
                font-weight: bold;
            }
            .header-right a {
                
                float: left;
                color: black;
                text-align: center;
                padding: 8px;
                margin: 10px;
                text-decoration: none;
                font-size: 18px; 
                line-height: 25px;
                border-radius: 4px;
            }
            .header a.logo {
                font-size: 30px;
                font-weight: bold;
            }
            .header-right a:hover {
                background-color: crimson;
                color: #fff;
            }
            .header-right {
                float: right;
            }
            @media screen and (max-width: 500px) {
                .header a {
                    float: none;
                    display: block;
                    text-align: left;
                }
                .header-right {
                    float: none;
                }
            }


            .container {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                max-width: 1200px;
                
            }
            #postList{ 
                margin-bottom:20px;
            }
            .list-item {
                margin: 0 0 5px 0;
                padding-left: 100px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 100px;
                font-size: 17px;
                line-height: 33px;
                color: black;
                border: 0px solid ;
                /* border-bottom: 1px solid #DC143C; */
                /* border-radius: 8px 8px; */
                /* box-shadow: 0.7px 0.7px 0.7px 0.7px black; */
                box-shadow: 0 0px 5px rgba(0,0,0,.1);
                background: #fff;
            }
            .list-item h4 {
                /* color: #0074a2; */
                /* margin-left: 10px; */
                /* margin-top: 100px; */
            }
            .list-item p {
                margin-top: 0px;
            }
            .list-item .id {
                padding-top: 0px;
                padding-left: 5px;
                font-size: 15px;
            }
            .list-item h5 {
                padding-top: 0px;
                padding-left: 10px;
            }
            .list-item h2 {
                padding-bottom: 0px;
            }
            .list-item button {
                background: #fbd0d9;
                text-transform: capitalize;
                font-size: 20px;
                cursor: pointer;
                border-radius: 5px;
                padding: 8px;
                padding-top: 8px;
                padding-bottom: 8px;
                border: 0px solid;
                margin-top: 35px;
                margin-left: 980px;
            }
            .list-item button a {
                text-decoration: none;
                color: crimson;
            }
            .list-item button:hover {
                background: crimson;
            }
            .list-item button a:hover {
                background: crimson;
                color:#fff;
            }
            .load-more {
                margin: 15px 25px;
                cursor: pointer;
                padding: 10px 0;
                text-align: center;
                font-weight:bold;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(window).scroll(function(){
                    var lastID = $('.load-more').attr('lastID');
                    
                    if(($('#postList').height() <= $(window).scrollTop() + $(window).height())&& (lastID != 0)){
                        $.ajax({
                            type:'POST',
                            url:'getData.php',
                            data:'post_id='+lastID,
                            beforeSend:function(){
                                $('.load-more').show();
                            },
                            success:function(html){
                                $('.load-more').remove();
                                $('#postList').append(html);
                            }
                        });
                    }
                });
            });
        </script>
    </head>

    <body>
        <div class="header">
            <div class="header-right">
                <a href="edit_profile.php">Edit Profile</a>
                <a href="logout.php">Logout</a>
            </div>
            <?php
                include 'config.php';
                $currentSession = $_SESSION["email"];
                $select = "SELECT * FROM users WHERE email = '$currentSession'";
                $result = mysqli_query($conn, $select);
                while($row = $result->fetch_assoc()) {
                    ?>
                    <h2><?php echo $row['name']; ?></h2>
                    <h4>Email: &nbsp; <span> <?php echo $row['email']; ?> </span> </h4>
                    <h4>Phone number: &nbsp; <span> <?php echo $row['phone_no']; ?> </span> </h4>
                <?php } 
            ?>
            <p> Posted works </p>

        </div>

        <div class="container">
            <div id="postList">
                <?php
                    require 'config.php';
                    $currentSession = $_SESSION["email"];
                    $result = "SELECT * FROM posts WHERE email = '$currentSession' ORDER BY time DESC LIMIT 7";
                    $query = mysqli_query($conn, $result);
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){
                            $postID = $row["post_id"];
                        ?>
                            <div class="list-item">
                                <h2><?php echo $row['title']; ?> <br>
                                <div class="id">Post ID:  <?php echo $row['post_id']; ?> &nbsp; &nbsp; &nbsp; &nbsp;
                                Time: <?php echo $row['time']; ?> </div> </h2>
                                <p><?php echo $row['description']; ?></h4>
                                <br>
                                <?php echo "<button><a href='delete.php?post_id=".$postID."'>Delete</a></button>"; ?> 
                            </div>
                        <?php } ?>

                        <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                            <img src="loading.gif"/>
                        </div>

                    <?php } ?>
            </div>
        </div>
    </body>
</html>
