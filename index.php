<?php

require_once './resources/db/conexion.php';

$db = new Database();
$con = $db->conexion();
$consulta = $con->query("SELECT dni,nombre,apellido,fecha_nacimiento FROM alumno ORDER BY nombre ASC");
$consulta->execute();
$respuestaAlumno = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./resources/bootstrap-5.3.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./resources/styles/style.css">
    <title>Sistema asistencia</title>
</head>
<body>

    <?php include './resources/includes/header.php'; ?>
  
    <main class="container">
        <section class="container">

            <div>
                <a href="crud.php">Ir a crud</a>
            </div>
        </section>

        <section class="container">
            <div class="row"> 
                <div class="col">
                    <h4>Alumnos</h4>
                    <a href="crud.php" class="btn btn-primary float-right">Nuevo alumno</a>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex me-4">
                            <label for="dni">DNI:</label>
                            <input type="text" id="dni">
                        </div>
                        <div>
                            <button onclick="">Buscar</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de nacimiento</th>
                                <th>Opciones</th>
                                <th>% Asitencias</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($respuestaAlumno as $row){
                            ?>
                            <tr>
                                <td> <?php echo $row['dni'];?></td>
                                <td> <?php echo $row['nombre'];?></td>
                                <td> <?php echo $row['apellido'];?></td>
                                <td> <?php echo $row['fecha_nacimiento'];?></td>
                                <td> 
                                    <div class="dropdown">
                                        <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            CRUD
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Editar</a></li>
                                          <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                        </ul>
                                        </div>         
                                </td>
                                <td>% Asistencia</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
    
</body>
</html>
<script src="./resources/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
