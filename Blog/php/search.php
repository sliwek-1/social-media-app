<?php 

    session_start();
    require_once('conn.php');

    $query = $_POST['searchTerm'];

    $request = $conn->prepare("SELECT firstname, surrname, img_usr FROM users WHERE NOT unique_id = :unique_id AND (firstname LIKE CONCAT('%', :search, '%') OR surrname LIKE CONCAT('%', :search, '%'))");
    $request->bindParam(':unique_id',$_SESSION['unique_id']);
    $request->bindParam(':search', $query);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($result) > 0){
        foreach($result as $res){
            $content = '
            <div class="user">
                <div class="user-img">
                    <img src="./img/'.$res['img_usr'].'">
                </div>
                <div class="user-name">'.$res['firstname']." ".$res['surrname'] .'</div>
            </div>';
            echo $content;
        }
    }else{
        echo "No user found";
    }
?>