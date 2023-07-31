<?php
include(__DIR__ . "/db.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    die();
}

// Aquí el usuario ya está logeado
include(__DIR__ . "/templates/header.php");
?>

<div class="container d-flex">
    <h2>
    <?php  
        if ($_SESSION["identifier"] === "email") {
        // El usuario inició sesión con su email
            echo "<p>Bienvenido, " . $_SESSION["email"] . "!</p>";
        } elseif ($_SESSION["identifier"] === "telefono") {
            // El usuario inició sesión con su teléfono
            echo "<p>Bienvenido, " . $_SESSION["telefono"] . "!</p>";
        } ?>
    </h2>
    <div class="mb-3">
        <label for="telefono" class="form-label">codigo de verificación</label>
        <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="">
    </div>
</div>