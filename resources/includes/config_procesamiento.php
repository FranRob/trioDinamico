<?php
require_once '../class/Parametros.php';
require_once '../db/conexion.php';
$db = new Database();
$conn = $db->getConexion();
$parametros = new Parametros($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardarConfiguracion"])) {
    // Recuperar valores del formulario
    $dias_de_clases = isset($_POST["dias_de_clases"]) ? $_POST["dias_de_clases"] : null;
    $porcentaje_promocion = isset($_POST["porcentaje_promocion"]) ? $_POST["porcentaje_promocion"] : null;
    $porcentaje_regular = isset($_POST["porcentaje_regular"]) ? $_POST["porcentaje_regular"] : null;

    // Verificar si ya existe una configuración en la base de datos
    $query = "SELECT COUNT(*) as count FROM parametros";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    $configuracionExistente = $result['count'] > 0;

    if ($configuracionExistente) {
        // Si existe, actualiza la configuración
        $parametros->actualizarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular);
      
    } else {
        // Si no existe, guarda una nueva configuración
        $parametros->guardarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular);
        
    }
    $db->cerrarConexion();


    header('Location: ../../index.php');
    exit();
}
?>
