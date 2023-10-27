<section class="container mt-5 seccion" id="alumnos">
      <div class="row"> 
        <div class="col">
          <div class="d-flex me-4 justify-content-evenly">
            <div class="d-flex">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-agregar">
                Nuevo Alumno
              </button>
                <div class="modal fade" id="modal-agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-agregar-Label" aria-hidden="true">
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
                          <label for="apellido" class="form-label">Apellido: </label>
                            <input type="text" name="apellido">
                            <br>
                          <label for="nombre" class="form-label">Nombre: </label>
                            <input type="text" name="nombre">
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
        </div>
      </div>
      <div class="row py-3">
        <div class="col">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Dni</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de nacimiento</th>
                <th class="text-center">Opciones</th>
                <th class="text-center">% Asistencias</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $respuestaMostrarAlumnos=$alumno->mostrarTodos();
              foreach($respuestaMostrarAlumnos as $row){?>
              <?php
                $alumno->dni = $row['dni'];
                $porcentaje_asistencia = $alumno->calcularPorcentajeAsistencia();
              ?>
              <tr>
                <td class="text-center"> <?php echo $row['dni'];?></td>
                <td class="text-center"> <?php echo $row['apellido'];?></td>
                <td class="text-center"> <?php echo $row['nombre'];?></td>
                <td class="text-center"> <?php echo date('d/m/Y', strtotime($row['fecha_nacimiento']));?></td>
                <td class="text-center"> 
                  <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      CRUD
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-editar-<?php echo $row['dni']; ?>">Editar</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-eliminar-<?php echo $row['dni']; ?>">Eliminar</a></li>
                    </ul>
                  </div>         
                </td>
                <div class="modal fade" id="modal-editar-<?php echo $row['dni']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-editar-Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal-editar-Label">Editar alumno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="./resources/includes/modificar_alumno.php" method="POST">
                            <fieldset>
                            <label for="dni_modificar-<?php echo $row['dni']; ?>">DNI del Alumno a Modificar:</label>
                                <input type="text" name="dni" id="dni_modificar-<?php echo $row['dni']; ?>" required value="<?php echo $row['dni']; ?>"><br>
                                <label for="apellido-<?php echo $row['dni']; ?>">Nuevo Apellido:</label>
                                <input type="text" name="apellido" id="apellido-<?php echo $row['dni']; ?>" value="<?php echo $row['apellido']; ?>"><br>
                                <label for="nombre-<?php echo $row['dni']; ?>">Nuevo Nombre:</label>
                                <input type="text" name="nombre" id="nombre-<?php echo $row['dni']; ?>" value="<?php echo $row['nombre']; ?>"><br>
                                <label for="fecha_nacimiento-<?php echo $row['dni']; ?>">Fecha de nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento-<?php echo $row['dni']; ?>" value="<?php echo $row['fecha_nacimiento']; ?>"><br>
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
                  <div class="modal fade" id="modal-eliminar-<?php echo $row['dni']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-eliminar-Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="modal-eliminar-Label">Eliminar alumno</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="./resources/includes/eliminar_alumno.php" method="POST">
                            <fieldset>
                              <label for="dni_eliminar-<?php echo $row['dni']; ?>">DNI del Alumno a Eliminar:</label>
                              <input type="text" name="dni" value="<?php echo $row['dni']; ?>" id="dni_eliminar" required><br>
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
                  <td class="text-center">% <?php echo $porcentaje_asistencia; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>