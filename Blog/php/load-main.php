<?php 

require_once('conn.php');

$pageNumber = $_POST['page'];
$postsOnPage = 2;

$offset = ($pageNumber - 1) * $postsOnPage;

try{
    $request = $conn->prepare("SELECT posts.unique_id,posts.user_id,posts.title,posts.img,users.firstname,users.surrname,users.img_usr FROM posts INNER JOIN users ON users.unique_id = posts.user_id ORDER BY posts.id ASC LIMIT :offset, :postPerPage");

    $request->bindParam(':offset', $offset, PDO::PARAM_INT);
    $request->bindParam(':postPerPage', $postsOnPage, PDO::PARAM_INT);

    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($result);
}catch(PDOException $e){
   die('Connection si failed'. $e->getMessage());
}


?>