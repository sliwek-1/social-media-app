<?php 
    session_start();
    require_once('conn.php');

    $userID = $_POST['userID'];

    $request = $conn->prepare("SELECT unique_id, firstname, surrname, img_usr FROM users WHERE unique_id = :user_id");
    $request->bindValue(':user_id', $userID);

    $request->execute();

    $result = $request->fetch(PDO::FETCH_ASSOC);
    header('Content-type: application/json');
    print_r(json_encode($result));
?>