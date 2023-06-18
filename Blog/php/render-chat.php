<?php 

    session_start();
    require_once('conn.php');

    $nadawca = $_SESSION['unique_id'];
    $odbiorca = $_POST['userID'];

    

?>