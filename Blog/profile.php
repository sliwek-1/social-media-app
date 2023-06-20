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
    <title>Document</title>
</head>
<body>
    <div class="header-profile">
        <?php 

            $userID = $_SESSION['unique_id'];

            $request = $conn->prepare("SELECT firstname, surrname FROM unique_id = :user_id");
            $request->bindParam(':user_id', $userID);
            $request->execute();

            $result = $request->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="user-name"><?php echo $result['firstname']." ".$result['surrname']; ?></div>
    </div>
</body>
</html>