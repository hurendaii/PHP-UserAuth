<?php

if ($_SERVER["REQUEST_METHOD"] = "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'login_view.inc.php';
        require_once 'login_model.inc.php';

        $errors = [];

        if (is_input_empty($username, $pwd)){
                $errors["empty_input"] = "Please fill in all fields.";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)){
            $errors["login_incorrect"] = "Incorrect login info.";
        }
        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pswd"])){
            $errors["login_incorrect"] = "Incorrect login info.";

        }

        require_once 'config_session.inc.php';

        if ($errors){//if there are errors in this array

            $_SESSION['errors_login'] = $errors;
            header("Location: ../index.php");
            die();
        }
            //create users id
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"] = time();
        
        header('Location: ../index.php?login=success');  
        
        $pdo = null;
        $stmt = null;
        die();
        
    } catch (PDOException $e) {
        die("Query faild: " . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}

?>
