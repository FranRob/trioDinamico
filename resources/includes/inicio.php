<section class="container mt-5 seccion" id="inicio">
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
      <form action="./index.php" method="POST">
        <label for="dni" class="col-form-label">DNI:</label>
          <input type="text" id="dni" name="dni">
          <button type="submit" class="btn btn-outline-warning ms-2" name="buscar">Buscar</button>
      </form>
    </div>
  </div>
</div>
</div>
<?php
if (isset($error)) {
    echo "<br>";
    echo '<div id="mensajeError" class="alert alert-danger text-center">' . $error . '</div>';
    echo '<script>
        setTimeout(function() {
            var mensajeError = document.getElementById("mensajeError");
            mensajeError.style.display = "none";
        }, 3000);
    </script>';
}
?>
<?php if (!empty($resultados)): ?>
<div class="row py-3">
  <div class="col">
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th class="text-center">DNI</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Fecha de nacimiento</th>
                  <th class="text-center">% Asistencias</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($resultados as $row): ?>
                  <?php
                  $alumno->dni = $row['dni'];
                  $porcentaje_asistencia = $alumno->calcularPorcentajeAsistencia();
                  ?>
                  <tr>
                      <td class="text-center"><?php echo $row['dni']; ?></td>
                      <td class="text-center"><?php echo $row['apellido']; ?></td>
                      <td class="text-center"><?php echo $row['nombre']; ?></td>
                      <td class="text-center"><?php echo $row['fecha_nacimiento']; ?></td>
                      <td class="text-center">%<?php echo $porcentaje_asistencia; ?></td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>
</div>
<?php endif; ?>
</section>