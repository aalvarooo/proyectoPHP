<?php
include(__DIR__ . "/db.php");
require_once(__DIR__ . "/templates/header.php");

if (!isset($_SESSION["logedin"]) || $_SESSION["logedin"] !== true) {
    header("Location: login.php");
    die();
}

$userData = $_SESSION["user_data"];

$stmt = $mysqli->prepare("SELECT `idUsuario` FROM CodigoSorteo WHERE `idUsuario` = ? ");
$stmt->bind_param("i", $userData["id"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
 
?>
<div class="bg-primary d-flex justify-content-center align-items-cente align-items-center vh-100">
    <div class="container justify-content-center p-5 bg-white rounded-5 w-75 m-5">
        <h2 class="text-center mb-3">Top 10 usuarios en el sorteo</h2>
        <table class="table">
                <thead >
                    <tr class="text-center">
                        <th>Usuario ID</th>
                        <th>Número de Tickets</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    // Consulta para obtener los 10 usuarios con los códigos más altos
                    $sql = "SELECT idUsuario, COUNT(idUsuario) AS cantidad_apariciones FROM CodigoSorteo GROUP BY idUsuario ORDER BY cantidad_apariciones DESC LIMIT 10";
                    $result = $mysqli->query($sql);
                    // Mostrar los resultados en la tabla
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $stmt = $mysqli->prepare("SELECT `nombre`, `correo` FROM `usuarios1` WHERE `id` = ? ");
                            $stmt->bind_param("i", $row["idUsuario"]);
                            $stmt->execute();
                            $result2 = $stmt->get_result();
                            $row2 = $result2->fetch_assoc();

                             echo "<tr><td>" . $row2["nombre"] . "</td><td>" . $row2["correo"] . "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                    }

                    // Cerrar conexión
                    $mysqli->close();
                    ?>
                </tbody>
        </table>
    </div>
</div>

<?php require_once(__DIR__ . "/templates/footer.php"); ?>