<?php
require_once ('./resources/db/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];

    // Verificar si el DNI existe en la tabla "Alumno"
    $query_check = "SELECT dni FROM alumno WHERE dni = :dni";
    $stmt_check = $conection->prepare($query_check);
    $stmt_check->bindParam(":dni", $dni);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        // El DNI existe en la base de datos, proceder a eliminar
        $query_delete = "DELETE FROM alumno WHERE dni = :dni";
        $stmt_delete = $conection->prepare($query_delete);
        $stmt_delete->bindParam(":dni", $dni);

        if ($stmt_delete->execute()) {
            echo "Alumno eliminado con éxito.";
        } else {
            echo "Error al eliminar alumno: " . $stmt_delete->errorInfo()[2];
        }
    } else {
        echo "El DNI no existe en la base de datos.";
    }
}
?>