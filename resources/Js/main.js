document.addEventListener('DOMContentLoaded', function() {
  ocultarSecciones(); // Oculta todas las secciones al cargar la página
  mostrarSeccion('inicio'); // Muestra la sección predeterminada
});

function mostrarSeccion(seccionId) {
  ocultarSecciones(); // Oculta todas las secciones antes de mostrar la seleccionada
  const seccionSeleccionada = document.getElementById(seccionId);
  seccionSeleccionada.style.display = 'block';
}

function ocultarSecciones() {
  const secciones = document.querySelectorAll('.seccion');
  secciones.forEach(seccion => {
    seccion.style.display = 'none';
  });
}

function seleccionarTodos() {
  // Obtiene una lista de todas las casillas de verificación
  let checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
  // Itera a través de todas las casillas de verificación
  checkboxes.forEach(function (checkbox) {
    // Cambia el valor de la casilla de verificación al valor opuesto
    checkbox.checked = !checkbox.checked;
  });
}



function coloresEstadoAsistencias() {
  const campoPorcentaje = document.querySelectorAll('.table-data-porcentaje');

  campoPorcentaje.forEach(function(porcentajeTd) {
    const contenidoTd = porcentajeTd.innerHTML;
    let porcentajeNumero = parseFloat(contenidoTd.replace('%', ''));
    
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
  console.log("DOM completamente cargado. Bienvenidos a TD asistencias para profes");
  coloresEstadoAsistencias();
});

