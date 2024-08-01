<?php
//takes care of input from the user

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}

//checking if email is valid
function is_email_valid(string $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

//checking if username is taken
function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    }else{
        return false;
    }
}
function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
function create_user(object $pdo, string $email, string $username, string $pwd){
    set_user($pdo, $email, $username, $pwd);
}

