<?php
    @include 'config.php';
    session_start();
    $currentSession = $_SESSION["email"];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home | Ohloss</title>
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
                margin-left: 150px;
                margin-right: 150px;
                margin-bottom: 1px;
                border-radius: 10px;
                box-shadow: 0 30px 30px rgba(0,0,0,.1);
                position: sticky;
                top: 0;
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
            .header-right a {
                
                float: left;
                color: black;
                text-align: center;
                padding: 8px;
                text-decoration: none;
                font-size: 18px; 
                line-height: 25px;
                border-radius: 4px;
                margin-left: 10px;
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
                border-radius: 8px 8px;
                /* box-shadow: 0.7px 0.7px 0.7px 0.7px black; */
                box-shadow: 0 10px 30px rgba(0,0,0,.1);
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
                margin-top: 30px;
            }
            .list-item button {
                /* padding-left: 200px; */
                background: #fbd0d9;
                color:crimson;
                text-transform: capitalize;
                font-size: 20px;
                cursor: pointer;
                border-radius: 5px;
                padding: 10px;
                padding-top: 8px;
                padding-bottom: 8px;
                border: 0px solid;
                margin-top: 35px;
                margin-left: 950px;
                margin-bottom: 10px;
            }
            .list-item button:hover {
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

            .sentBy .sentM {
                margin-top: 10px;
                font-size: 15px;
                color:#333;
                margin-bottom: 0;
                margin-top: 40px;
                padding: 0;
            }
            .sentBy .sentM span {
                font-weight: bold;
            }
            .sentBy .sentR {
                line-height: 0.8;
                margin-top: 10px;
                font-size: 15px;
                color:#333;
                margin-top: 0;
                margin-bottom: 30px;
            }
            .sentBy p a {
                font-size: 18px;
                color:crimson;
                text-decoration: none;
            }

            .floating-button{
                width: 55px;
                height: 55px;
                border-radius: 50%;
                background: crimson;
                position: fixed;
                bottom: 70px;
                right: 320px;
                cursor: pointer;
                box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
            }

            .plus{
                color: white;
                position: absolute;
                top: 0;
                display: block;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                padding: 0;
                margin: 0;
                line-height: 55px;
                font-size: 38px;
                font-family: 'Roboto';
                font-weight: 300;
                animation: plus-out 0.3s;
                transition: all 0.3s;
            }

            .container-floating{
                position: fixed;
                width: 70px;
                height: 70px;
                bottom: 30px;
                right: 30px;
                z-index: 50px;
            }

            .container-floating:hover{
                height: 400px;
                width: 90px;
                padding: 30px;
            }

            .container-floating:hover .plus{
                animation: plus-in 0.15s linear;
                animation-fill-mode: forwards;
            }

            .edit{
                position: absolute;
                top: 0;
                display: block;
                bottom: 0;
                left: 0;
                display: block;
                right: 0;
                padding: 0;
                opacity: 0;
                margin: auto;
                line-height: 65px;
                transform: rotateZ(-70deg);
                transition: all 0.3s;
                animation: edit-out 0.3s;
            }

            .container-floating:hover .edit{
                animation: edit-in 0.2s;
                animation-delay: 0.1s;
                animation-fill-mode: forwards;
            }

            @keyframes edit-in{
                from {opacity: 0; transform: rotateZ(-70deg);}
                to {opacity: 1; transform: rotateZ(0deg);}
            }

            @keyframes edit-out{
                from {opacity: 1; transform: rotateZ(0deg);}
                to {opacity: 0; transform: rotateZ(-70deg);}
            }

            @keyframes plus-in{
                from {opacity: 1; transform: rotateZ(0deg);}
                to {opacity: 0; transform: rotateZ(180deg);}
            }

            @keyframes plus-out{
                from {opacity: 0; transform: rotateZ(180deg);}
                to {opacity: 1; transform: rotateZ(0deg);}
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
            <a href="home.php" class="logo">Ohloss</a>
            <div class="header-right">
                <a href="post_work.php">Post work</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <div class="container">
            <div id="postList">
                <?php
                    require 'config.php';
                    $result = "SELECT * FROM posts ORDER BY time DESC LIMIT 7";
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
                                <div class="sentBy">
                                    <p class="sentM">Posted by: &nbsp; <span> <?php echo $row['email']; ?> </span> </p>
                                    <p class="sentR">Request to get this work &nbsp; - <a href="https://mail.google.com/mail/u/0/?ogbl#inbox?compose=new"> &nbsp; Send mail</a></p>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                            <img src="loading.gif"/>
                        </div>

                    <?php } ?>
            </div>
        </div>
        
        <div class="container-floating">
            <div class="floating-button">
                <a href="post_work.php">
                    <p class="plus">+</p>
                    <img class="edit" src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">
                </a> 
            </div>
        </div>

    </body>
</html>
