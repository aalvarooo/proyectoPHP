<?php
/**
 * 
 * @author Tible Technologies
 * 
 */
session_start(); // Inicia la sesión, necesaria para mantener el estado de inicio de sesión

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);

// Base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'sorteo');
define('DB_PASS', 'sorteo');
define('DB_NAME', 'sorteo');

global $mysqli;
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_error){
    die("Connection failed: ". $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
 
/**
 * 
 * @param int $user_id El ID del usuario con el que queremo iniciar la sesión de usuario
 * 
 * @return bool Si el login ha sido correcto o no
 * 
 */
function loginUser($user_id) {
    global $mysqli;
    
    if (empty($user_id)) {
        return false;
    }
    
    if (!is_int($user_id)) {
        return false;
    }

    if (isset($_SESSION["logedin"]) && $_SESSION["logedin"] == true) {
        // Destruir la sesión y eliminar todas las variables asociadas
        session_destroy();
        // Opcionalmente, también puedes limpiar el array $_SESSION para estar seguro de que todos los datos se eliminan:
        $_SESSION = array();
    }

    $stmt = $mysqli->prepare("SELECT * FROM `usuarios1` WHERE `id` = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows <= 0 ) {
        return false;
    }

    $stmt->close();
    $user = $result->fetch_assoc(); 
    
    return !!$_SESSION = [
        "logedin"   => true,
        "user_data" => $user
    ];
}

/**
 * 
 * Inserta un código de descuento en la base de datos asociado a un usuario. No checkea si el código ya existe en la base de datos.
 * 
 * @param int    $codigo  El código del sorteo
 * @param string $usuario El usuario
 * 
 * @return bool Si la inserción es correcta o no
 * 
 */
function insertarCodigo($codigo, $usuario) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT IGNORE INTO `CodigoSorteo` (`codigoId`, `idUsuario`) VALUES (?, ?)");
    $stmt->bind_param("ii", $codigo, $usuario);
    $stmt->execute();
    $stmt->close();
    return !empty($stmt->insert_id);
}
 
if (!empty($_GET["logout"])){
    session_destroy();
    header("Location: login.php");
} 




