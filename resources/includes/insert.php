<?php
require_once ('./resources/db/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni=$_POST['dni'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];

    $conexion = new mysqli("localHost", "root", "", "sistema_asistencias");

    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }
    //DIE se utiliza para imprimir un mensaje y terminar la ejecución del script en ese punto

    $sql = "INSERT INTO alumno (dni, nombre, apellido, fecha_nacimiento) VALUES (:dni, :nombre, :apellido, :fecha_nacimiento)";
    
    $stmt = $conection -> Prepare($sql);
    $stmt->bindParam(":dni",$dni);
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":apellido",$apellido);
    $stmt->bindParam(":fecha_nacimiento",$fecha_nacimiento);
    print_r ("El alumno/a fue creado/a con éxito");
    $stmt->Execute();
}
?>