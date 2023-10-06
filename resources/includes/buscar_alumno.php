<?php
require_once './resources/db/conexion.php'; 
require_once './resources/class/Alumno.php';

$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);

$resultados = array(); // Inicializa un arreglo para almacenar los resultados
$mostrarResultados = false;
// Verifica si se ha enviado el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {
    $dni = $_POST['dni'];

    // Realiza la búsqueda del alumno por DNI
    $resultado = $alumno->buscarPorDni($dni);

    if ($resultado) {
        $resultados[] = $resultado; // Agrega el resultado al arreglo
        $mostrarResultados = True;
    }
}
?>