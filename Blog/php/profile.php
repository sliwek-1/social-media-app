<?php 
    require_once('conn.php');
    $userID = $_POST['userID'];

    if(isset($userID)){
        $request = $conn->prepare('SELECT users.firstname, users.surrname, posts.title, posts.img  FROM users INNER JOIN posts ON users.unique_id = posts.user_id WHERE users.unique_id = :user_id AND posts.user_id = :user_id');
        $request->bindValue(':user_id', $userID);
        $request->execute();

        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        header('Content-type: appliaction/json');
        print_r(json_encode($result));
    }

?>