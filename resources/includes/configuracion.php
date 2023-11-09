<?php
require_once './resources/class/Parametros.php';
$parametros = new Parametros($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardarConfiguracion"])) {
    // Recuperar valores del formulario
    $dias_de_clases = isset($_POST["dias_de_clases"]) ? $_POST["dias_de_clases"] : null;
    $porcentaje_promocion = isset($_POST["porcentaje_promocion"]) ? $_POST["porcentaje_promocion"] : null;
    $porcentaje_regular = isset($_POST["porcentaje_regular"]) ? $_POST["porcentaje_regular"] : null;

    // Verificar si ya existe una configuración en la base de datos
    $query = "SELECT COUNT(*) as count FROM parametros";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    $configuracionExistente = $result['count'] > 0;

    if ($configuracionExistente) {
        // Si existe, actualiza la configuración
        $parametros->actualizarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular);
      
    } else {
        // Si no existe, guarda una nueva configuración
        $parametros->guardarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular);
        
    }
}
?>

<!-- Tu formulario y HTML restante aquí -->
<section class="container mt-5 seccion" id="configuracion">
    <div class="row d-flex align-items-center alert alert-info text-center mt-5">
        <p class="my-auto">En los siguientes inputs vas a poder configurar aspectos importantes para el funcionamiento de la app</p>
    </div>
    <div class="row my-4">
        <div class="col-12 mt-5">
            <form class="d-flex flex-column w-75 mx-auto" action="" method="POST">
                <label for="dias_de_clases" class="fw-medium text-center align-middle lh-lg">Dias totales de clases</label>
                <input type="number" name="dias_de_clases" id="dias_de_clases" class="form-control mb-2" value="<?php echo $dias_de_clases; ?>" required>
                
                <label for="porcentaje_promocion" class="fw-medium text-center align-middle lh-lg">Porcentaje para promocionar</label>
                <input type="number" name="porcentaje_promocion" id="porcentaje_promocion" class="form-control mb-2" value="<?php echo $porcentaje_promocion; ?>" required>
                
                <label for="porcentaje_regular" class="fw-medium text-center align-middle lh-lg">Porcentaje para regularizar</label>
                <input type="number" name="porcentaje_regular" id="porcentaje_regular" class="form-control mb-2" value="<?php echo $porcentaje_regular; ?>" required>

                <button type="submit" name="guardarConfiguracion" class="btn btn-outline-success">Guardar Configuración</button>
            </form>
        </div>
    </div>
</section>