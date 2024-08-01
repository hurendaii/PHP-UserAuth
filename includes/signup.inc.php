<?php

if ($_SERVER["REQUEST_METHOD"] = "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //error handlers (methods are in controller)

        $errors = [];

        if (is_input_empty($username, $pwd, $email)){
                $errors["empty_input"] = "Please fill in all fields.";
        }if(is_email_valid($email)){
                $errors["invalid_email"] = "Invalid email used.";
        }
        if(is_username_taken($pdo, $username)){
                $errors["username_taken"] = "Username has already been taken.";
        }
        if(is_email_registered($pdo, $email)){
                $errors["email_used"] = "Email is already registered.";
        }
        
        require_once 'config_session.inc.php';
        
        if ($errors){//if there are errors in this array

                $_SESSION['errors_signup'] = $errors;

                $signUpData = [
                    "username" => $username,
                    "email" => $email
                ];

                $_SESSION['signup_data'] = $signUpData;


                header("Location: ../index.php");
                die();
        }

        create_user($pdo, $email, $username, $pwd);

        header('Location: ../index.php?signup=success');
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());

    }
}else{
    header('Location: ../index.php');
    die();
}