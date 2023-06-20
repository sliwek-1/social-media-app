<?php 
    session_start();
    require_once('php/conn.php');

    if(!isset($_SESSION['unique_id'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/set-profile.js" defer></script>
    <link rel="stylesheet" href="./css/profile.css">
    <title>Document</title>
</head>
<body>
    <main class="main">
        <div class="header-profile">
            <?php 
                $userID = $_GET['unique_id'];

                $request = $conn->prepare("SELECT firstname, surrname, img_usr FROM users WHERE unique_id = :user_id");
                $request->bindParam(':user_id', $userID);
                $request->execute();

                $result = $request->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="img">
                <img src="<?php $result['img_usr'] ?>" alt="#">
            </div>
            <div class="user-name"><?php echo $result['firstname']." ".$result['surrname']; ?></div>
        </div>
        <div class="post-container">
            <?php 
                $res = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id");
                $res->bindValue(':user_id', $userID);
                $res->execute();

                $result = $res->fetchAll(PDO::FETCH_ASSOC);

                $output = "";

                foreach($result as $row){
                    $output .= '
                    <div class="post">
                        <div class="title-post" >'.$row['title'].'</div>
                        <img src="img/'.$row['img'].'" class="img-post">
                    </div>';
                }

                echo $output;
            ?>
        </div>
    </main>
</body>
</html>