<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];

    // Eliminar alumno
    $query = "DELETE FROM alumno WHERE dni = :dni";
    $stmt = $conection->prepare($query);
    $stmt->bindParam(":dni", $dni);
    
    if ($stmt->execute()) {
        echo "Alumno eliminado con éxito.";
    } else {
        echo "Error al eliminar alumno: " . $stmt->errorInfo()[2];
    }
}

$dni = $_GET["dni"];
$query = "SELECT * FROM alumno WHERE dni = :dni";
$stmt = $conection->prepare($query);
$stmt->bindParam(":dni", $dni);
$stmt->execute();
$alumno = $stmt->fetch();

$nombre = $alumno['nombre'];
$apellido = $alumno['apellido'];
$fecha_nacimiento = $alumno['fecha_nacimiento'];



// ?>
// //<?php
// require_once "conexion.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $dni = $_POST['dni'];

//     // Resto del código para eliminar el alumno
//     $query = "DELETE FROM alumno WHERE dni = :dni";
//     $stmt = $conection->prepare($query);
//     $stmt->bindParam(":dni", $dni);

//     if ($stmt->execute()) {
//         echo "Alumno eliminado con éxito.";
//     } else {
//         echo "Error al eliminar alumno: " . $stmt->errorInfo()[2];
//     }
// } else {
//     echo "No se recibió un DNI válido para eliminar al alumno.";
// }

// // Ahora verificamos si tenemos un DNI en la solicitud GET antes de ejecutar el código relacionado con la base de datos
// if (isset($_GET["dni"])) {
//     $dni = $_GET["dni"];
//     $query = "SELECT * FROM alumno WHERE dni = :dni";
//     $stmt = $conection->prepare($query);
//     $stmt->bindParam(":dni", $dni);
    
//     if ($stmt->execute()) {
//         $alumno = $stmt->fetch();

//         if ($alumno) {
//             $nombre = $alumno['nombre'];
//             $apellido = $alumno['apellido'];
//             $fecha_nacimiento = $alumno['fecha_nacimiento'];
//         } else {
//             echo "No se encontró ningún alumno con el DNI proporcionado.";
//         }
//     } else {
//         echo "Error al obtener alumno: " . $stmt->errorInfo()[2];
//     }
// } else {
//     echo "No se proporcionó un DNI válido para obtener al alumno.";
// }
// ?>

