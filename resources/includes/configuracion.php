<section class="container mt-5 seccion" id="configuracion">
    <div class="row d-flex align-items-center alert alert-primary text-center mt-5">
        <p class="my-auto">En los siguientes inputs vas a poder configurar aspectos importantes para el funcionamiento de la app</p>
    </div>
    <div class="row my-4">
        <div class="col-12 mt-5">
            <form class="d-flex flex-column w-75 mx-auto" action="./resources/includes/config_procesamiento.php" method="POST">
                <label for="dias_de_clases" class="fw-medium text-center align-middle lh-lg">Dias totales de clases</label>
                <input type="number" name="dias_de_clases" id="dias_de_clases" class="form-control mb-3 text-center" required>
                
                <label for="porcentaje_promocion" class="fw-medium text-center align-middle lh-lg">Porcentaje para promocionar</label>
                <input type="number" name="porcentaje_promocion" id="porcentaje_promocion" class="form-control mb-3 text-center" required>
                
                <label for="porcentaje_regular" class="fw-medium text-center align-middle lh-lg">Porcentaje para regularizar</label>
                <input type="number" name="porcentaje_regular" id="porcentaje_regular" class="form-control mb-3 text-center" required>

                <button type="submit" name="guardarConfiguracion" class="btn btn-outline-success mt-3">Guardar Configuración</button>
            </form>
        </div>
    </div>
</section>