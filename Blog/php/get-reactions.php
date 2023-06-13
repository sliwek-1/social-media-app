<?php 

    require_once('conn.php');

    $posts = $conn->prepare("SELECT unique_id AS 'post_id' FROM posts");
    $posts->execute();

    $result = $posts->fetchAll(PDO::FETCH_ASSOC);

    $count_result = [];

    foreach($result as $post){
        $count = $conn->prepare("SELECT
        post_id,
        SUM(CASE WHEN type_reaction = 'like' THEN 1 ELSE 0 END) AS likes,
        SUM(CASE WHEN type_reaction = 'dislike' THEN 1 ELSE 0 END) AS dislikes
        FROM post_opinions WHERE post_id = :post_id GROUP BY post_id;");

        $count->bindParam(':post_id', $post['post_id']);
        $count->execute();

        $count_result[] = $count->fetchAll(PDO::FETCH_ASSOC);
    }


    header('Content-Type: application/json');
    echo json_encode($count_result);
?>