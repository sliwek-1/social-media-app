<?php 
    session_start();
    require_once('conn.php');

    $userID = $_POST['userID'];

    $request = $conn->prepare("SELECT * FROM users WHERE unique_id = :user_id");
    $request->bindValue(':user_id', $userID);

    $request->execute();

    $result = $request->fetch(PDO::FETCH_ASSOC);

    print_r($result);
?>