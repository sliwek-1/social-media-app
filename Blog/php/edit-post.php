<?php 
    require_once('conn.php');
    $post_id = $_POST['post_id'];

    $request = $conn->prepare("SELECT * FROM posts WHERE unique_id = :post_id");
    $request->bindValue(':post_id',$post_id);
    $request->execute();

    $result = $request->fetch(PDO::FETCH_ASSOC);

    $content = '
        <form action="#" class="edit">
        <input type="text" value="'.$_POST['post_id'].'" name="post_id" hidden>
        <input type="text" value="'.$result['title'].'" name="new_title" placeholder="Tytul">
        <input type="text" value="'.$result['content'].'" name="new_content" placeholder="Content">
        <input type="file" name="new_img">
        <button class="save-edit">Zapisz</button>
        </form>';

    echo $content;
?>