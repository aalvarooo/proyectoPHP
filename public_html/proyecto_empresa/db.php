<?php 
// Función para escribir en el archivo de registro
function writeLog($filename, $logLevel, $message) {
    $logEntry = "[" . date('Y-m-d H:i:s') . "] [" . $logLevel . "] " . $message . PHP_EOL;
    file_put_contents($filename, $logEntry, FILE_APPEND);
}

//base de datos
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'tibletech9');
define('DB_NAME', 'proyectoEmpresa');

global $DB_MYSQLI;
$DB_MYSQLI= mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
if(mysqli_connect_errno()){
    writeLog("database.log", "ERROR", "Error al conectar a la abse de datos.".mysqli_connect_error());
    exit();

}
$DB_MYSQLI->set_charset("utf8mb4");

$query = "SELECT * FROM usuario";
$result = mysqli_query($DB_MYSQLI, $query);
if (!$result) {
    writeLog("database.log", "ERROR", "Error en la consulta: " . mysqli_error($DB_MYSQLI));
    exit();
}