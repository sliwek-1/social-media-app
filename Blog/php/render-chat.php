<?php 

    session_start();
    require_once('conn.php');

    $nadawca = $_SESSION['unique_id'];
    $odbiorca = $_POST['userID'];
    $output = "";

    $request = $conn->prepare("SELECT * FROM chat WHERE (nadawca = :nadawca and odbiorca = :odbiorca) or (nadawca = :odbiorca and odbiorca = :nadawca)");

    $request->bindParam(':odbiorca', $odbiorca);
    $request->bindParam(':nadawca', $nadawca);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    

    foreach($result as $row){
        if($row['nadawca'] == $nadawca){
            $output .= '<div class="msg-out-element">
                        <div class="msg-out">
                            <p>'.$row['tekst'].'</p>
                        </div>
                        </div>';
        }else{
            $output .= '<div class="msg-in-element">
                        <div class="msg-in">
                        <div class="img-usr-msg-in">
                            <img src="bg.png" alt="#">
                        </div>
                        <p>'.$row['tekst'].'</p>
                    </div>
                    </div>';
        }
    }


    echo $output;

?>