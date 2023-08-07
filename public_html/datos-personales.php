<?php
include(__DIR__ . "/db.php");
require_once(__DIR__ . "/templates/header.php");

if (!isset($_SESSION["logedin"]) || $_SESSION["logedin"] !== true) {
    header("Location: login.php");
    die();
}

$userData = $_SESSION["user_data"];


if (!empty($_GET["DELETE_ID"])){
    $id = $_GET['DELETE_ID'];
    $stmt = $mysqli->prepare("DELETE FROM `CodigoSorteo` WHERE `codigoId`=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

}
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

<div class="bg-primary d-flex justify-content-center align-items-cente align-items-center vh-100">
    <div class="container justify-content-center p-5 bg-white rounded-5 w-75 m-5">

        <div class="row">
            <div class="col 12 col-md-6 d-flex">
                <table class="table" style="border-style: unset !important;">
                    <thead style="border-style: unset !important;">
                        <tr style="border-style: unset !important;">
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $userData["nombre"] ?></td>
                            <td><?= $userData["telefono"] ?></td>
                            <td>@<?= $userData["correo"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col 12 col-md-6">
                <div class="container">
                    <h2 class="text-center p-5 text-dark fw-bold fs-2 "> Estos son tus códigos registrados</h2>
                    <?php
                    if ($result->num_rows > 0) :
                        while ($fila = $result->fetch_assoc()) : ?>
                            <div class="row text-center border-bottom">
                                <div class="col">
                                    <div class="text-black fw-bold fs-5 text-center "> <?= $fila['codigoId'] ?></div>
                                </div>
                                <div class="col">
                                    <a href="?DELETE_ID=<?= $fila['codigoId'] ?>">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </i>
                                    </a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;

                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
 
<?php require_once(__DIR__ . "/templates/footer.php"); ?>
