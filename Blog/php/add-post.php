<?php 
    require_once('conn.php');
    session_start();

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_SESSION['admin_id'];


    if(!empty($title) && !empty($content)){
        if(isset($_FILES['img'])){
            $img_name = $_FILES['img']['name'];
            $img_type = $_FILES['img']['type'];
            $img_tmp = $_FILES['img']['tmp_name'];

            $img_ext = explode('.',$img_name);
            $img_extension = end($img_ext);

            $extensions = ['png', 'jpg', 'jpeg'];

            if(in_array($img_extension, $extensions) == true){
                $time = time();

                $new_name = $time.$img_name;
                if(move_uploaded_file($img_tmp,'img/'.$new_name)){
                    $post_id = rand(0, 1000000);

                    $request = $conn->prepare("INSERT INTO posts(unique_id, user_id, title, content, img) 
                    VALUES (:post_id, :user_id, :title, :content, :img)");

                    $request->bindValue(':post_id',$post_id);
                    $request->bindValue(':user_id', $user_id);
                    $request->bindValue(':title', $title);
                    $request->bindValue(':content', $content);
                    $request->bindValue(':img', $new_name);

                    $request->execute();

                }else{
                    echo "something went wrong";
                }
            }else{
                echo "Image mus have correct extension: jpg, png or jpeg";
            }
        }
    }else{
        echo "All inputs are required";
    }
?>