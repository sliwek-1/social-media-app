<?php 
    session_start();
    include_once('php/conn.php');

    if(!isset($_SESSION['unique_id'])){
        header('location: ./login.php');
    }

    $request = $conn->prepare("SELECT * FROM users WHERE unique_id = :unique_id");
    $request->bindValue(':unique_id',$_SESSION['unique_id']);
    $request->execute();

    $result = $request->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/show-chat.js" defer></script>
    <script src="./js/send-message.js" defer></script>
    <script src="./js/get-chat-data.js" defer></script>
    <script src="./js/show-reactions.js" defer></script>
    <script src="./js/get-user-list.js" defer></script>
    <script src="./js/get-reaction-data.js" defer></script>
    <script src="./js/load-main.js" defer></script>
    <script src="./js/search-user.js" defer></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main-header.css">
    <link rel="stylesheet" href="./css/chat.css">
    <script src="https://use.fontawesome.com/6f9e2a672b.js"></script>
    <title>Strona Główna</title>
</head>
<body>
    <header class="header">
        <div class="user-info">
            <input type="text" name="user-id" class="user-id" id="user-id" value="<?php echo $_SESSION['unique_id']; ?>"hidden>
            <div class="user-img">
                <?php if($result['img_usr'] == NULL){ ?>
                    <img src="./user.jpg" alt="#" class="user-img">
                <?php }else{  ?>
                    <img src="./img/<?= $result['img_usr']?>" alt="#" class="user-img">
                <?php } ?>
            </div>
            <div class="user-name"><?= $result['firstname']." ".$result['surrname'] ?></div>
        </div>
        <div class="search-section">
            <input type="search" name="search" id="search" class="search" placeholder="Wyszukaj znajomych">
            <div class="user-list">
            </div>
        </div>
        </div>
        <div class="link-section">
            <a href="./php/profile.php?unique_id=<?= $_SESSION['unique_id'] ?>">Profil</a>
            <a href="./php/admin.php?unique_id=<?= $_SESSION['unique_id'] ?>">Admin</a>
            <a href="./php/logout.php?unique_id=<?= $_SESSION['unique_id'] ?>">Wyloguj</a>
        </div>
    </header>
    <main class="main-content">
        <div class="users-list">
            <h3 class="user-list-title">Lista Użytkowników</h2>
        </div>
        <div class="post-center">
            <div class="load-more">Load more</div>
        </div>
        <div class="chat">
            <div class="header-chat">
                <div class="user-chat">
                    <div class="img">
                        <img src="#" alt="#" class="user-chat-img">
                    </div>
                    <div class="user-name-chat">Jan Kowalski</div>
                </div>
                <button class="close-chat">x</button>
            </div>
            <div class="chat-center">
                    <div class="msg-out-element">
                        <div class="msg-out">
                            <p>Hej</p>
                        </div>
                    </div>
                    <div class="msg-in-element">
                        <div class="msg-in">
                            <div class="img-usr-msg-in">
                                <img src="bg.png" alt="#">
                            </div>
                            <p>siemka</p>
                        </div>
                    </div>
                    <div class="msg-out-element">
                        <div class="msg-out">
                            <p>Co tam robisz?</p>
                        </div>
                    </div>
                    <div class="msg-in-element">
                        <div class="msg-in">
                            <div class="img-usr-msg-in">
                                <img src="bg.png" alt="#">
                            </div>
                            <p>A nic ciekawego a co?</p>
                        </div>
                    </div>
            </div>
            <div class="chat-bar">
                <form action="#" class="send-message">
                    <input type="text" name="user-chat-id" class="user-chat-id" value="" hidden>
                    <input type="text" name="chat-msg" id="chat-msg" class="chat-msg" placeholder="Napisz wiadomość"> 
                    <button class="submit-message"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>