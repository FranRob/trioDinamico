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
           echo ' <link rel="stylesheet" href="../bootstrap-5.3.2/css/bootstrap.min.css">';
           echo '<div class="container d-flex justify-content-center align-items-center vh-100 w-50">';
           echo ' <div class="container d-flex justify-content-center align-items-center">';
           echo '     <div class="alert alert-success" role="alert">';
           echo '         <h4 class="alert-heading col text-center">¡Asistencias registradas con éxito!</h4>';
           echo '         <p>Presiona el botón para volver a la página principal</p>';
           echo '         <hr>';
           echo '                    <p class="mb-0 col text-center"> <a href="../../index.php"><button type="button" class="btn btn-outline-success">Volver</button></a> </p>';
           echo '       </div>';
           echo ' </div>';
           echo '</div>';
?>