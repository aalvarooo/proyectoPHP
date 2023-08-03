<?php
include(__DIR__ . "/db.php");

if (!isset($_SESSION["logedin"]) || $_SESSION["logedin"] !== true) {
    header("Location: login.php");
    die();
}

$userData = $_SESSION["user_data"];

$stmt = $mysqli->prepare("SELECT `codigoId` FROM CodigoSorteo WHERE `idUsuario` = ? ");
$stmt->bind_param("i", $userData["id"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-primary d-flex justify-content-center align-items-cente align-items-center vh-100">
    <div class="container justify-content-center p-5 bg-white rounded-5 w-75 m-5">
        <h2 class="text-center p-5 text-dark fw-bold fs-2 "> Estos son tus códigos registrados</h2>
        <?php
        if ($result->num_rows > 0) :
            while ($fila = $result->fetch_assoc()) : ?>
                <div class="text-black fw-bold fs-5 border-bottom py-2 text-center "> <?= $fila['codigoId'] ?></div>
        <?php
            endwhile;
        endif;

        ?>
</body>

</html>