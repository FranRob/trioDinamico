<?php
require_once '../db/conexion.php';
require_once '../class/Alumno.php';
require_once '../class/Asistencia.php';
date_default_timezone_set("America/Argentina/Buenos_Aires");


$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);
$asistencia = new Asistencia($conn);


$fecha_diferida = $_POST['fecha_diferida'] ?? null;

if ($fecha_diferida) {
    // Si se proporciona una fecha diferida, utiliza esa fecha para guardar la asistencia
    $fecha_asistencia = $fecha_diferida;
} else {
    // Si no se proporciona una fecha diferida, usa la fecha y hora actuales del sistema
    $fecha_asistencia = date("Y-m-d H:i:s");
}

foreach ($_POST as $nombre_checkbox => $valor_checkbox) {
    if ($valor_checkbox == 'on') {
        $dni_alumno = str_replace('asistencia_', '', $nombre_checkbox);

        // Verificar si ya existe una asistencia para este alumno en la fecha dada
        $stmt_verificacion = $conn->prepare("SELECT COUNT(*) as count FROM asistencias WHERE dni_alumno = :dni_alumno AND DATE(fecha) = DATE(:fecha)");
        $stmt_verificacion->bindParam(':dni_alumno', $dni_alumno);
        $stmt_verificacion->bindParam(':fecha', $fecha_asistencia);
        $stmt_verificacion->execute();
        $result = $stmt_verificacion->fetch(PDO::FETCH_ASSOC);

        // Si no hay asistencia para este alumno en la fecha dada, se procede a insertar
        if ($result['count'] == 0) {
           $asistencia->agregar($dni_alumno, $fecha_asistencia);

            echo ' <link rel="stylesheet" href="../bootstrap-5.3.2/css/bootstrap.min.css">';
            echo '<div class="container d-flex justify-content-center align-items-center vh-100 w-50">';
            echo ' <div class="container d-flex justify-content-center align-items-center">';
            echo '     <div class="alert alert-success" role="alert">';
            echo '         <h4 class="alert-heading col text-center">¡Asistencias registradas con éxito!</h4>';
            echo '         <hr>';
            echo '                    <p class="mb-0 col text-center"> <a href="../../index.php"><button type="button" class="btn btn-outline-success">Volver</button></a> </p>';
            echo '       </div>';
            echo ' </div>';
            echo '</div>';
        }else{
            echo ' <link rel="stylesheet" href="../bootstrap-5.3.2/css/bootstrap.min.css">';
            echo '<div class="container d-flex justify-content-center align-items-center vh-100 w-50">';
            echo ' <div class="container d-flex justify-content-center align-items-center">';
            echo '     <div class="alert alert-danger" role="alert">';
            echo '         <h4 class="alert-heading col text-center">¡Error!</h4>';
            echo '         <p class="text-center">La asistencia ya fue cargada para esa fecha<p>';       
            echo '         <hr>';
            echo '                    <p class="mb-0 col text-center"> <a href="../../index.php"><button type="button" class="btn btn-outline-danger">Volver</button></a> </p>';
            echo '       </div>';
            echo ' </div>';
            echo '</div>';

        }
    }
}


?>