<?php
require_once '../db/conexion.php';
require_once '../class/Alumno.php';

$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];


    if ($alumno->agregar($dni, $nombre, $apellido,$fecha_nacimiento)){
        echo 'Exitoso' . '<br>';
        echo '<a href="../../index.php"><button>Volver</button></a>';
    }else{
        echo 'Error' . '<br>';
        echo '<a href="../../index.php"><button>Volver</button></a>';
    }





}
?>
