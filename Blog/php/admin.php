<?php
    session_start();
    include_once('conn.php');

    if(!isset($_SESSION['unique_id'])){
        header('location: login.php');
    }

    $request = $conn->prepare("SELECT admin_permissions as 'permision' FROM users WHERE unique_id = :unique_id");
    $request->bindValue(':unique_id',$_GET['unique_id']);
    $request->execute();

    $result = $request->fetch(PDO::FETCH_ASSOC);

    $adminPermision = $result['permision'];

    if($adminPermision == 1){
        $_SESSION['admin_id'] = $_GET['unique_id'];
        header('location: ../admin-page.php');
    }else{
        header('location: ../main.php');
    }
?>
