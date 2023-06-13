<?php 

    session_start();
    require_once('conn.php');

    $request = $conn->prepare("SELECT * FROM post_opinions WHERE user_id = :user_id");

    $request->bindValue(':user_id', $_SESSION['unique_id']);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    header("Content-type: application/json");
    echo json_encode($result);

?>