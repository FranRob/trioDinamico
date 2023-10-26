function mostrarSeccion(seccionId) {
    const secciones = document.querySelectorAll('.seccion');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });
    const seccionSeleccionada = document.getElementById(seccionId);
    seccionSeleccionada.style.display = 'block';
}
mostrarSeccion('inicio');

function seleccionarTodos() {
    // Obtiene una lista de todas las casillas de verificación
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    // Itera a través de todas las casillas de verificación y establece su valor en "ON"
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = true;
    });
  }