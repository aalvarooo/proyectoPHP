 <?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// Base de datos
define('DB_SERVER', 'localhost');
define('DB_USER', 'sorteo');
define('DB_PASS', 'sorteo');
define('DB_NAME', 'sorteo');

global $DB_MYSQLI;
$DB_MYSQLI = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if($DB_MYSQLI->connect_error){
    die("Connection failed: ". $DB_MYSQLI->connect_error);
}
$DB_MYSQLI->set_charset("utf8mb4");

$sql = "INSERT INTO usuarios1 (nombre, correo, telefono, contrasena) VALUES ('ÁLVARO', 'alvaro@gmail.com', 555, 'alvaro')";
if($DB_MYSQLI->query($sql) === true){
    echo "nueva insercion creada de manera exitosa";
} else {
    echo "Error;". $sql . "<br>". $conn->error;
}
$DB_MYSQLI->close();
?>