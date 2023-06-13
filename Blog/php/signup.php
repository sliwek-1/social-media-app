<?php 
    session_start();
    include_once('conn.php');
    function validate($data){
        trim($data);
        htmlspecialchars($data);
        stripcslashes($data);

        return $data;
    }

    $nickname = validate($_POST['nickname']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $passwd = validate($_POST['passwd']);
    $confirm_passwd = validate($_POST['confirm-passwd']);
    $email = validate($_POST["email"]);

    if(!empty($nickname) && !empty($firstname) && !empty($lastname) && !empty($passwd) && !empty($confirm_passwd) && !empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(!($passwd !== $confirm_passwd)){
                if(!(strlen($passwd) < 8 || strlen($confirm_passwd) < 8)){

                    $response = $conn->prepare("SELECT  COUNT(*) AS 'count' FROM users WHERE email = :email;");
                    $response->bindValue(':email', $email);
                    $response->execute();
                    $result = $response->fetch(PDO::FETCH_ASSOC);

                    if($result['count'] > 0){

                         echo "rekord istnieje";

                    }else{
                        $uniqueID = rand(1,1000000);
                        $res = $conn->prepare("INSERT INTO users (unique_id, email, passwd, confirm_passwd, surrname, firstname, nickname, admin_permissions)
                                  VALUES (:uniqueid, :email, :passwd, :confirm_passwd, :lastname, :firstname, :nickname, 0)");

                        $res->bindParam(':uniqueid', $uniqueID);
                        $res->bindParam(':email', $email);
                        $res->bindParam(':passwd', $passwd);
                        $res->bindParam(':confirm_passwd',$confirm_passwd);
                        $res->bindParam(':lastname',$lastname);
                        $res->bindParam(':firstname',$firstname);
                        $res->bindParam(':nickname',$nickname);

                        $res->execute();

                        $_SESSION['unique_id'] = $uniqueID;

                        echo "success";
                    }
                }else{
                    echo "Passwords are to short";
                }
            }else{
                echo "Password are not the same";
            }
        }else{
            echo "Email in not valid";
        }

    }else{
        echo "All Inputs are required";
    }

?>