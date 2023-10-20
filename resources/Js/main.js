function mostrarSeccion(seccionId) {
    const secciones = document.querySelectorAll('.seccion');
    secciones.forEach(seccion => {
        seccion.style.display = 'none';
    });
    const seccionSeleccionada = document.getElementById(seccionId);
    seccionSeleccionada.style.display = 'block';
}
mostrarSeccion('inicio');
