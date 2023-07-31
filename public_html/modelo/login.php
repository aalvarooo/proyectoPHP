<?php

require_once(__DIR__ . "/../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"];
    $telefono = $_POST["telefono"];

    // Verificar si el usuario o el teléfono existen en la base de datos
    $sentencia = $mysqli->prepare("SELECT `id` FROM `usuarios1` WHERE `correo` = ? OR `telefono` = ?");
    $sentencia->bind_param("ss", $email, $telefono);
    $sentencia->execute();
    $result = $sentencia->get_result();
    $sentencia->close();

    
    if ($result->num_rows === 1) {
        // Usuario o teléfono encontrado, iniciar sesión
        $_SESSION["loggedin"] = true;

        // Verificar si el usuario ingresó un email o un teléfono y guardar el valor correspondiente en la sesión
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["identifier"] = "email";
            $_SESSION["identifier_value"] = $email;
        } else {
            $_SESSION["identifier"] = "telefono";
            $_SESSION["identifier_value"] = $telefono;
        }

        // Redireccionar a la página de inicio
        header("Location: index.php");
        die();
    } 

    // Usuario o teléfono no encontrado, mostrar mensaje de error
    header("Location: registro.php");
    die();
}
?>

