<?php
require_once './resources/db/conexion.php';
require_once './resources/class/Alumno.php';
require_once './resources/class/Asistencia.php';
require_once './resources/includes/buscar_alumno.php';
require_once './resources/class/Parametros.php';

date_default_timezone_set("America/Argentina/Buenos_Aires");
$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);
$parametro= new Parametros($conn);
$asistencia = new Asistencia($conn);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./resources/bootstrap-5.3.2/css/bootstrap.min.css" >
  <link rel="stylesheet" href="./resources/bootstrap-5.3.2/icons/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./resources/styles/style.css">

  <title>TD Asistencias para profes</title>
</head>
<body>

  <?php include './resources/includes/header.php'; ?>
  
  <main class="container">
    <?php include './resources/includes/inicio.php'; ?>
    <?php include './resources/includes/alumnos.php'; ?>
    <?php include './resources/includes/asistencias.php'; ?>
    <?php include './resources/includes/configuracion.php'; ?>
    
  </main>
    
</body>
</html>
<script src="./resources/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="./resources/Js/main.js"></script>