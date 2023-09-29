<?php
require_once './resources/db/conexion.php';
require_once './resources/class/Alumno.php';
require_once './resources/class/Profesor.php';
require_once './resources/class/Asistencia.php';

$db = new Database();
$conn = $db->getConexion();
$alumno = new Alumno($conn);
$profesor = new Profesor($conn);
$asistencia = new Asistencia($conn);

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
        <section class="container mt-5">
            <div class="row"> 
                <div class="col">
                        <div class="d-flex me-4 justify-content-evenly">
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-agregar-">
                                    Nuevo Alumno
                                </button>

                                <div class="modal fade" id="modal-agregar-" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-agregar-Label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal-agregar-Label">Agregar alumno</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="./resources/includes/agregar_alumno.php" method="POST">
                                            <fieldset>
                                                <label for="dni" class="form-label">DNI: </label>
                                                  <input type="number" name="dni">
                                                  <br>
                                                <label for="nombre" class="form-label">Nombre: </label>
                                                  <input type="text" name="nombre">
                                                  <br>
                                                <label for="apellido" class="form-label">Apellido: </label>
                                                  <input type="text" name="apellido">
                                                  <br>
                                                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento: </label>
                                                  <input type="date" name="fecha_nacimiento">
                                                  <br>
                                            </fieldset>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            <div class="d-flex">
                              <label for="dni" class="col-form-label">DNI:</label>
                              <input type="text" id="dni">
                              <button class="btn btn-outline-warning ms-2" onclick="">Buscar</button>
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
                                $respuestaMostrarAlumnos=$alumno->mostrarTodos();
                                foreach($respuestaMostrarAlumnos as $row){
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
                                          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-editar-">Editar</a></li>
                                          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-eliminar-">Eliminar</a></li>
                                        </ul>
                                        </div>         
                                </td>

                                <div class="modal fade" id="modal-editar-" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-editar-Label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal-editar-Label">Editar alumno</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="./resources/includes/modificar_alumno.php" method="POST">
                                          <fieldset>
                                            <label for="dni_modificar">DNI del Alumno a Modificar:</label>
                                            <input type="text" name="dni" id="dni_modificar" required><br>

                                            <label for="nombre">Nuevo Nombre:</label>
                                            <input type="text" name="nombre" id="nombre"><br>

                                            <label for="apellido">Nuevo Apellido:</label>
                                            <input type="text" name="apellido" id="apellido"><br>

                                            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"><br>
                                          </fieldset>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="editar" class="btn btn-primary">Editar</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal fade" id="modal-eliminar-" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-eliminar-Label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal-eliminar-Label">Eliminar alumno</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="./resources/includes/eliminar_alumno.php" method="POST">
                                          <fieldset>
                                            <label for="dni_eliminar">DNI del Alumno a Eliminar:</label>
                                            <input type="text" name="dni" id="dni_eliminar" required><br>
                                          </fieldset>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" name="eliminar" class="btn btn-primary">Eliminar</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                
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
