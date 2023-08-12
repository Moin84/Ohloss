<?php
    @include 'config.php';

    if(isset($_GET['post_id'])){
        // $id = $_GET['post_id'];
        $post_id = mysqli_real_escape_string($conn, $_GET['post_id']);
        $delete = " DELETE FROM posts WHERE post_id = $post_id ";
        $result = mysqli_query($conn, $delete);
    }
    header('location: profile.php');
?>