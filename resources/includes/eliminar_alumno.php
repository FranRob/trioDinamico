<?php  
require_once '../db/conexion.php';
require_once '../class/Alumno.php';

$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);



if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $dni = $_POST['dni'];


    if ($alumno->eliminar($dni)){
        echo ' <link rel="stylesheet" href="../bootstrap-5.3.2/css/bootstrap.min.css">';
           echo '<div class="container d-flex justify-content-center align-items-center vh-100 w-50">';
           echo ' <div class="container d-flex justify-content-center align-items-center">';
           echo '     <div class="alert alert-success" role="alert">';
           echo '         <h4 class="alert-heading col text-center">¡Alumno eliminado con éxito!</h4>';
           echo '         <p>Para volver a la página principal presiona el botón</p>';
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
           echo '         <p>Para volver a la página principal presiona el botón</p>';
           echo '         <hr>';
           echo '                    <p class="mb-0 col text-center"> <a href="../../index.php"><button type="button" class="btn btn-outline-danger">Volver</button></a> </p>';
           echo '       </div>';
           echo ' </div>';
           echo '</div>';
    }
}

?> 

