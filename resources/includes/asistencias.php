<section class="container mt-2 seccion" id="asistencias">
  <div class="row py-3">
      <div class="col">
        <form method="POST" action="./resources/includes/agregar_asistencia.php">
          <div class="row d-flex justify-content-evenly align-items-center m-3">
            <div class="col-5 fw-medium">
              <label for="fecha_diferida">Asistencia diferida:</label>
                <input type="datetime-local" name="fecha_diferida" id="fecha_diferida"> <!-- Campo para ingresar una fecha diferida -->
            </div>
            <div class="col-3 me-5">
              <button type="button" class="btn btn-outline-info btn-color-replace" onclick="seleccionarTodos();">Seleccionar todos</button>
            </div>
          </div>
          <table class="table table-hover custom-table">
              <thead>
                  <tr>
                    <th class="text-center">Apellido</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Presente</th>
                      <th class="text-center">% Asistencias</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $respuestaMostrarAlumnos = $alumno->mostrarTodos();
                  foreach ($respuestaMostrarAlumnos as $row) {
                      // Genera un nombre único para la checkbox basado en el ID del alumno
                      $nombre_checkbox = 'asistencia_' . $row['dni'];
                  ?>
                  <?php
                    $alumno->dni = $row['dni'];
                    $porcentaje_asistencia = $alumno->calcularPorcentajeAsistencia();
                  ?>
                      <tr>
                        <td class="text-center"> <?php echo $row['apellido']; ?></td>
                          <td class="text-center"> <?php echo $row['nombre']; ?></td>
                          <td class="text-center"><input type="checkbox" name="<?php echo $nombre_checkbox; ?>"></td>
                          <td class="text-center table-data-porcentaje">%<?php echo $porcentaje_asistencia; ?></td>
                      </tr>
                  <?php } ?>
              </tbody>
          </table>
          <div class="mx-auto p-2" style="width: 200px;">
          <button type="submit" class="btn btn-outline-success">Enviar Asistencias</button>
          </div>
        </form>
      </div>
  </div>
</section>