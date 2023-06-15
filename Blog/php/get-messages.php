<?php 

    session_start();
    require_once('conn.php');

    echo $_POST['chat-msg'];

?>