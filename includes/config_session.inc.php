<?php

//mandatory ini sets
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path'=> '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (isset($_SESSION["user_id"])){
    if(!isset($_SESSION["last_regeneration"])){
        regenerate_session_id_loggedin();
    } else {
        if (time() - $_SESSION["last_regeneration"] >= 1800){
            regenerate_session_id_loggedin();
        }
    }
} else{
    if(!isset($_SESSION["last_regeneration"])){
        regenerate_session_id();
    } else {
        if (time() - $_SESSION["last_regeneration"] >= 1800){
            regenerate_session_id();
        }
    }
    
}   

function regenerate_session_id(){
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

//if user is already logged in
function regeneate_session_id_loggedin(){
    session_regenerate_id(true);
    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);
    $_SESSION["last_regeneration"] = time();
}
