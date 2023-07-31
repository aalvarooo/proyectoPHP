<?php
session_start(); // Inicia la sesión, necesaria para mantener el estado de inicio de sesión

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

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
