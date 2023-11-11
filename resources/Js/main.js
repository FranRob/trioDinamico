
document.addEventListener('DOMContentLoaded', function() {
  mostrarSeccion('inicio');
});

function mostrarSeccion(seccionId) {
  const seccionSeleccionada = document.getElementById(seccionId);
  seccionSeleccionada.style.display = 'block';
  const secciones = document.querySelectorAll('.seccion');
  secciones.forEach(seccion => {
    seccion.style.display = (seccion.id === seccionId) ? 'block' : 'none';
  });
}

function seleccionarTodos() {
  // Obtiene una lista de todas las casillas de verificación
  let checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
  // Itera a través de todas las casillas de verificación y establece su valor en "ON"
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = true;
  });
}

function coloresEstadoAsistencias() {
  const campoPorcentaje = document.querySelectorAll('.table-data-porcentaje');

  campoPorcentaje.forEach(function(porcentajeTd) {
    const contenidoTd = porcentajeTd.innerHTML;
    let porcentajeNumero = parseFloat(contenidoTd.replace('%', ''));
    console.log("Porcentaje como número:", porcentajeNumero);
    if (porcentajeNumero >= 80) {
      porcentajeTd.style.backgroundColor = '#50CA35';
    }
    if (porcentajeNumero < 80 && porcentajeNumero >= 60) {
      porcentajeTd.style.backgroundColor = '#DBD32F';
    }
    if (porcentajeNumero < 60) {
      porcentajeTd.style.backgroundColor = '#DB562F';
    }
  });
}
document.addEventListener('DOMContentLoaded', function() {
  console.log("DOM completamente cargado. Ejecutando coloresEstadoAsistencias...");
  coloresEstadoAsistencias();
});

