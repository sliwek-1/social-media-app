<?php 

    require_once('conn.php');

    $new_title = htmlspecialchars($_POST['new_title']);
    $new_content = htmlspecialchars($_POST['new_content']);

    if(!empty($new_title) && !empty($new_content)){
        if(isset($_FILES['new_img'])){
            $file_name = $_FILES['new_img']['name'];
            $file_type = $_FILES['new_img']['type'];
            $file_tmp = $_FILES['new_img']['tmp_name'];

            $img_ext = explode('.',$file_name);
            $extension = end($img_ext);

            $extensions = ['jpg', 'png', 'jpeg'];

            if(in_array($extension,$extensions) == true){
                $time = time();

                $new_img_name = $time.$file_name;

                if(move_uploaded_file($file_tmp, '../img/'.$new_img_name)){
                    $request = $conn->prepare("UPDATE posts SET title = :title, content = :content, img = :img WHERE unique_id = :post_id");

                    $request->bindParam(':title', $new_title);
                    $request->bindParam(':content', $new_content);
                    $request->bindParam(':img', $new_img_name);
                    $request->bindParam(':post_id', $_POST['post_id']);

                    $request->execute();

                    echo "success";
                }else{
                    echo "Something went wrong";
                }
            }else{
                echo "File must have correct extenssion: jpg, png, jpeg";
            }

        }else{
            echo "Something went wrong";
        }
    }else{
        echo "All inputs are required";
    }

?>