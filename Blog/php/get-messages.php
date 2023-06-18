<?php 

    session_start();
    require_once('conn.php');

    $odbiorca = $_POST['user-chat-id'];
    $nadawca = $_SESSION['unique_id'];
    $wiadomosc = $_POST['chat-msg'];


    if(!empty($wiadomosc)){
        $request = $conn->prepare("INSERT INTO chat(nadawca, odbiorca, tekst) VALUES (:nadawca, :odbiorca, :tekst)");
        $request->bindValue(':nadawca', $nadawca);
        $request->bindValue(':odbiorca', $odbiorca);
        $request->bindValue(':tekst',$wiadomosc);

        $request->execute();
    }else{
        echo "Wiadomość nie może być pusta";
    }

?>