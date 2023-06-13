<?php 
    try{
        $db_server = 'localhost';
        $db_name = 'blog';
        $db_user = 'root';
        $db_passwd = '';                

        $conn = new PDO(
            "mysql:host=$db_server;dbname=$db_name",
            $db_user,
            $db_passwd,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        );

        if($conn){
            //echo "success";
        }
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
        die();
    }
?>