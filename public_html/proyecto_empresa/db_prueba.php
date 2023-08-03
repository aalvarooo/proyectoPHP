<?php
/**
 * @author Álvaro Mateos
 * 
 * 
 */

 session_start();
 ini_set('display_errors', 1);
 ini_set('display_startups_errors', 1);
error_reporting(E_ALL);

//Base de datos 
define('DB_HOST', 'localhost');
define('DB_USER', 'sorteoPrueba');
define('DB_PASS', 'sorteoPrueba');
define('DB_NAME', 'sorteoPrueba');

// CREATE connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//Check connection
if ($mysqli->connect_error){
    die("Connection failed: ".$mysqli->connect_errno);
}

$mysqli->set_charset("uft8mb4");

/**
 * 
 * 
 * 
 * 
 */
function loginUser($user_id){
    global $mysqli;

    if(empty($user_id)) {
        return false;
    }

    if(!is_int($user_id)) {
        return false;
    }

    if(isset($_SESSION["logedin"]) && $_SESSION["logedin"] == true){

        session_destroy();
        $_SESSION = array();
    }

    $stmt = $mysqli->prepare("SELECT * FROM `usuarios1` WHERE `id` = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows <= 0) {
        return false;
    }
    $stmt->close();
    $user = $result->fetch_assoc();

    return !!$_SESSION = [
        "loggedin"   => true,
        "user_data"  => $user
    ];

}



