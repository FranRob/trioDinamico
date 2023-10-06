function mostrarSeccion(seccionId) {
    // Oculta todas las secciones
    const secciones = document.querySelectorAll('.seccion');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });

    // Muestra la sección seleccionada
    const seccionSeleccionada = document.getElementById(seccionId);
    seccionSeleccionada.style.display = 'block';
}
mostrarSeccion('inicio');