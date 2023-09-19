<?php
require_once('conexion.php'); // Incluye el archivo de conexión a la base de datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si se ha enviado una solicitud POST// Post envia datos desde el formulario.
    $dni = $_POST['dni']; // Obtiene el valor del campo 'dni' desde el formulario POST.
    $nombre = $_POST['nombre']; // Obtiene el valor del campo 'nombre' desde el formulario POST.
    $apellido = $_POST['apellido']; // Obtiene el valor del campo 'apellido' desde el formulario POST.
    $fecha_nacimiento = $_POST['fecha_nacimiento']; // Obtiene el valor del campo 'fecha_nacimiento' desde el formulario POST.

    $query = "UPDATE alumno SET dni = :dni, nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento WHERE dni = :dni";
    // Prepara una consulta SQL para actualizar registros en la tabla 'alumno' usando sentencias preparadas.
    $stmt = $conection->prepare($query); // Prepara la consulta.
    $stmt->bindParam(":dni", $dni); // Vincula el parámetro :dni con la variable $dni.
    $stmt->bindParam(":nombre", $nombre); // Vincula el parámetro :nombre con la variable $nombre.
    $stmt->bindParam(":apellido", $apellido); // Vincula el parámetro :apellido con la variable $apellido.
    $stmt->bindParam(":fecha_nacimiento", $fecha_nacimiento); // Vincula el parámetro :fecha_nacimiento con la variable $fecha_nacimiento.
    $stmt->execute(); // Ejecuta la consulta SQL con los valores proporcionados.

    // A partir de aquí, los datos del alumno se han actualizado en la base de datos.
}

$dni = $_GET["dni"]; // Obtiene el valor del parámetro 'dni' desde la URL.
$query = "SELECT * FROM alumno WHERE dni = :dni"; // Prepara una consulta SQL para seleccionar un alumno por su dni.
$stmt = $conection->prepare($query); // Prepara la consulta.
$stmt->bindParam(":dni", $dni); // Vincula el parámetro :dni con la variable $dni.
$stmt->execute(); // Ejecuta la consulta SQL.
$alumno = $stmt->fetch(); // Obtiene la primera fila de resultados y la almacena en $alumno.



$dni = $alumno['dni']; // Obtiene el dni del alumno desde la fila recuperada.
$nombre = $alumno['nombre']; // Obtiene el nombre del alumno desde la fila recuperada.
$apellido = $alumno['apellido']; // Obtiene la apellido del alumno desde la fila recuperada.
$fecha_nacimiento = $alumno['fecha_nacimiento']; // Obtiene el fecha_nacimiento del alumno desde la fila recuperada.
?>
