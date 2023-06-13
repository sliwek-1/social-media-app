<?php 
    session_start();

    if(!isset($_SESSION['admin_id'])){
        header('location: main.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/edit-post.js" defer></script>
    <script src="./js/admin-navigation.js" defer></script>
    <script src="./js/add-post.js" defer></script>
    <script src="./js/back-admin.js"></script>
</head>
<body>
    <div class="modal"></div>
    <div class="edit-area">
        <button class="close-edit">X</button>
        <div class="edit-form">
        </div>
    </div>
    <header class="header-admin">
        <nav class="header-nav">
            <div class="title">PANEL ADMINISTRATORA</div>
            <a href="#" class="back-btn">Powrót</a>
        </nav>
    </header>
    <main class="main">
        <nav class="nav">
            <ul class="nav-list">
                <li class="list-item active" data-id="section-admin">Strona Główna</li>
                <li class="list-item" data-id="add-post">Dodaj Post</li>
                <li class="list-item">Użytkownicy</li>
            </ul>
            <div class="copyright">&copy;Mateusz Śliwinski</div>
        </nav>
        <section class="section section-admin active" data-id="section-admin">
            <h2>Edytuj Posty</h2>
            <div class="nav-post">
                <div class="post-name info-post">
                    Nazwa
                </div>
                <div class="post-desc info-post">
                    Opis
                </div>
                <div class="post-img info-post">
                    Zdjęcie
                </div>
                <div class="post-info info-post">
                    User-id
                </div>
                <div class="post-info info-post">
                    post-id
                </div>
                <div class="post-actions info-post">
                    Akcje
                </div>
            </div>
            <div class="post-section">
            </div>
        </section>
        <section class="section add-post" data-id="add-post">
            <h1>ADD POST</h1>
            <div class="form">
                <form action="#" class="add-post-form">
                    <input type="text" name="title" placeholder="Tytuł">
                    <textarea style="resize: none;" type="area" name="content" placeholder="Content"></textarea>
                    Dodaj zdjęcie: <input type="file" name="img">
                    <button class="submit">Dodaj</button>
                </form>
            </div>
        </section>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>