<?php 

    session_start();
    require_once('conn.php');

    $reaction = $_POST['reaction'];
    $post_id = $_POST['postID'];
    $user_id = $_SESSION['unique_id'];

    $request = $conn->prepare("SELECT * FROM post_opinions WHERE post_id = :post_id and user_id = :user_id");
    $request->bindValue(':post_id', $post_id);
    $request->bindValue(':user_id', $user_id);

    $request->execute();

    $result = $request->fetchAll();

    if(count($result) > 0){
        $update = $conn->prepare("UPDATE post_opinions SET type_reaction = :reaction WHERE post_id = :post_id and user_id = :user_id");
        $update->bindValue(':post_id', $post_id);
        $update->bindValue(':user_id', $user_id);
        $update->bindValue(':reaction', $reaction);

        $update->execute();

    }else{
        $insert = $conn->prepare("INSERT INTO post_opinions(post_id,user_id,type_reaction) VALUES (:post_id,:user_id,:reaction)");
        $insert->bindValue(':post_id', $post_id);
        $insert->bindValue(':user_id', $user_id);
        $insert->bindValue(':reaction', $reaction);

        $insert->execute();

    }
?>