<?php
    if(!empty($_POST["id"])){
    require 'config.php';

    $lastID = $_POST['post_id'];
    $showLimit = 2;

    $resultAll = "SELECT COUNT(*) as num_rows FROM posts WHERE post_id < ".$lastID." ORDER BY id DESC";
    $queryAll = mysqli_query($conn, $resultAll);
    $rowAll = $queryAll->fetch_assoc();
    $allNumRows = $rowAll['num_rows'];

    $result = "SELECT * FROM posts WHERE post_id < ".$lastID." ORDER BY id DESC LIMIT ".$showLimit;
    $query = mysqli_query($conn, $result);

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){ 
            $postID = $row["post_id"]; ?>
            <div class="list-item">
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['description']; ?></h4>
            </div>
        <?php } ?>
        <?php if($allNumRows > $showLimit){ ?>
            <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
                <img src="loading.gif"/>
            </div>
        <?php }else{ ?>
            <div class="load-more" lastID="0">
                That's All!
            </div>
        <?php }
    }else{ ?>
        <div class="load-more" lastID="0">
            No more posts!!!
        </div>
    <?php }
    }
?>