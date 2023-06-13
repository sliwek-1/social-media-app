<?php 

    require_once('conn.php');

    $content = "";
    $request = $conn->prepare("SELECT * FROM posts");
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row){
        $content = '
            <div class="post-element">
            <form method="#" class="post">
            <div class="title-post info-post">
                '.$row['title'].'
            </div>
            <div class="description info-post">
                '.$row['content'].'
            </div>
            <div class="img info-post">
                '.$row['img'].'
            </div>
            <div class="info-user info-post">
                <span>
                    <p class="user-id">'.$row['user_id'].'</p>
                </span>
            </div>
            <div class="info-user info-post">
                <span>
                    <p class="post-id">'.$row['unique_id'].'</p>
                    <input type="text" value="'.$row['unique_id'].'" name="post_id" hidden>
                </span>
            </div>
            <div class="actions info-post">
                <button class="action-btn edit-btn">Edit</button>
                <button class="action-btn remove-btn">Delete</button>
            </div>
            </form> 
            </div>';
        echo $content;
    }
?>