<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['dni'];

    // Eliminar alumno
    $query = "DELETE FROM alumno WHERE dni = :dni";
    $stmt = $conection->prepare($query);
    $stmt->bindParam(":dni", $dni);
    
    if ($stmt->execute()) {
        echo "Alumno eliminado con éxito.";
    } else {
        echo "Error al eliminar alumno: " . $stmt->errorInfo()[2];
    }
}

$dni = $_GET["dni"];
$query = "SELECT * FROM alumno WHERE dni = :dni";
$stmt = $conection->prepare($query);
$stmt->bindParam(":dni", $dni);
$stmt->execute();
$alumno = $stmt->fetch();

$nombre = $alumno['nombre'];
$apellido = $alumno['apellido'];
$fecha_nacimiento = $alumno['fecha_nacimiento'];



?>

