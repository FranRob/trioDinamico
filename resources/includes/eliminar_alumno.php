<?php  
require_once '../db/conexion.php';
require_once '../class/Alumno.php';

$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);



if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $dni = $_POST['dni'];


    if ($alumno->eliminar($dni)){
        echo 'Exitoso' . '<br>';
        echo '<a href="../../index.php"><button>Volver</button></a>';
    }else{
        echo 'Error' . '<br>';
        echo '<a href="../../index.php"><button>Volver</button></a>';
    }

}



?> 
