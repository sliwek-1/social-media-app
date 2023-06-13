<?php 

    session_start();
    require_once('conn.php');


    $request = $conn->prepare("SELECT unique_id,firstname,surrname,status,img_usr  FROM users WHERE NOT unique_id = :unique_id");
    $request->bindValue(':unique_id', $_SESSION['unique_id']);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    header("Content-type: application/json");
    echo json_encode($result);

?>