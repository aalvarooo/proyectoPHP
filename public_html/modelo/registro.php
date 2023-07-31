<?php 
include(__DIR__ . "/../templates/header.php");
include(__DIR__ . "/../db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["telefono"]) && !empty($_POST["contrasena"])){

	$sentencia = $mysqli->prepare("INSERT INTO `usuarios1`
		(`nombre`, `correo`, `telefono`, `contrasena`)
		VALUES
		(?, ?, ?, ?)");
	$sentencia->bind_param("ssis", $_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["contrasena"]);
	$sentencia->execute();
	header("Location: index.php");
}