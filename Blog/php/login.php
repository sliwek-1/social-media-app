<?php 

session_start();
include_once('conn.php');
function validate($data){
    trim($data);
    htmlspecialchars($data);
    stripcslashes($data);

    return $data;
}

$email = validate($_POST['email']);
$passwd = validate($_POST['passwd']);


if(!empty($email) && !empty($passwd)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $request = $conn->prepare("SELECT COUNT(*) as 'count' FROM users WHERE email = :email AND passwd = :passwd");
        $request->bindValue(':email',$email);
        $request->bindValue(':passwd',$passwd);

        $request->execute();

        $result = $request->fetch(PDO::FETCH_ASSOC);

        if($result['count'] >= 1){
            $res2 = $conn->prepare('SELECT unique_id FROM users WHERE email = :email AND passwd = :passwd');
            $res2->bindValue(':email',$email);
            $res2->bindValue(':passwd',$passwd);

            $res2->execute();

            $getData = $res2->fetch(PDO::FETCH_ASSOC);

            $_SESSION['unique_id'] = $getData['unique_id'];

            if(isset($_SESSION['unique_id'])){
                echo "success";
            }else{
                echo "Something went wrong";
            }
        }else{
            echo "Something is wrong with your password or email";
        }

    }else{  
        echo "Something is wrong with your email";
    }
}else{
    echo "All Inputs are required";
}