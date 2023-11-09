<?php
require_once '../db/conexion.php';
require_once '../class/Alumno.php';
require_once '../class/Asistencia.php';


$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);
$asistencia = new Asistencia($conn);

$fecha = date("Y-m-d-H-i");
foreach ($_POST as $nombre_checkbox => $valor_checkbox) {
    // Verifica si el valor de la checkbox es "on"
    if ($valor_checkbox == 'on') {
        // Extrae el número de identificación del alumno del nombre de la checkbox
        $dni_alumno = str_replace('asistencia_', '', $nombre_checkbox);

        // Prepara una consulta SQL para insertar la asistencia
        $stmt = $conn->prepare("INSERT INTO asistencias (dni_alumno, fecha) VALUES (:dni_alumno, :fecha)");
        $stmt->bindParam(':dni_alumno', $dni_alumno);
        $stmt->bindParam(':fecha', $fecha);
        // Ejecuta la consulta
        $stmt->execute();
    }
}
echo 'Exitoso'.'<br>';
echo '<a href="../../index.php"><button>Volver</button></a>';
?>