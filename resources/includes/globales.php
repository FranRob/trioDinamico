<?php
require_once '../db/conexion.php';

$db = new Database();
$conn = $db->getConexion();

$diasClases;
$porcentajePromocion;
$porcentajeRegular;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['diasClases'])) {
        $diasClases = $_POST['diasClases'];
        actualizarValor('dias_de_clases', $diasClases, $conn);
    }

    if (isset($_POST['porcentajePromocion'])) {
        $porcentajePromocion = $_POST['porcentajePromocion'];
        actualizarValor('porcentaje_promocion', $porcentajePromocion, $conn);
    }

    if (isset($_POST['porcentajeRegularizar'])) {
        $porcentajeRegular = $_POST['porcentajeRegularizar'];
        actualizarValor('porcentaje_regular', $porcentajeRegular, $conn);
    }
}

function actualizarValor($columna, $valor, $conexion) {
    $sql = "UPDATE parametros SET $columna = :valor WHERE parametro_id = :id";
    $stmt = $conexion->prepare($sql);

    $valor_de_identificacion = 1;

    $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
    $stmt->bindParam(':id', $valor_de_identificacion, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Valor actualizado correctamente.";
    } else {
        echo "Error al actualizar el valor: " . $stmt->errorInfo()[2];
    }
    $stmt->closeCursor(); // Cierra el cursor
}


// Cierra la conexión a la base de datos al finalizar el script si es necesario
$db->cerrarConexion();
?>
