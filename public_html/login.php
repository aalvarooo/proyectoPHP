<?php

require_once(__DIR__ . "/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verificar si el usuario o el teléfono existen en la base de datos
    $sentencia = $mysqli->prepare("SELECT `id` FROM `usuarios1` WHERE `correo` = ? OR `telefono` = ?");
    $sentencia->bind_param("si", $_POST["email"], $_POST["telefono"]);
    $sentencia->execute();
    $result = $sentencia->get_result();
   
    $sentencia->close();
    
    if ($result->num_rows <= 0) {        
        header("Location: registro.php");
        die();
    }
    
    $user_data = $result->fetch_assoc();
    if (loginUser($user_data["id"])) {
        header("Location: index.php");       
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-primary d-flex justify-content-center align-items-cente align-items-center vh-100">
    <div class="container justify-content-center p-5 bg-white rounded-5 w-75">
        <div class="d-flex justify-content-center fs-1">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>
        </div>
        <h2 class="text-center p-5 text-dark fw-bold fs-2 "> Iniciar sesión con tu teléfono o contraseña</h2>
        <form class="container justify-content-center d-grid gap-3 p-3" method="post">
            <div class="input-group">
                <div class="input-group-text bg-info">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                </div>
                    <input type="email" class="form-control"  placeholder="Ingresa tu email" name="email">
            </div>
            <div class="input-group">
                <div class="input-group-text bg-info">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16 64C16 28.7 44.7 0 80 0H304c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H80c-35.3 0-64-28.7-64-64V64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64H80V384H304V64z"/></svg>                    </div>
                <input type="text" class="form-control"  placeholder="Ingresa tu teléfono" name="telefono">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
</body>
</html>