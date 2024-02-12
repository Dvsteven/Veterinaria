// Agrega funcionalidad de mostrar/ocultar formulario de modificar datos
document.addEventListener("DOMContentLoaded", function () {
    var datosPersonales = document.getElementById("datosPersonales");
    var modificarDatos = document.getElementById("modificarDatos");

    // Muestra datos personales, oculta formulario de modificar al cargar la página
    datosPersonales.style.display = "block";
    modificarDatos.style.display = "none";
});

function toggleModificarDatos() {
    var datosPersonales = document.getElementById("datosPersonales");
    var modificarDatos = document.getElementById("modificarDatos");

    // Alterna entre mostrar datos personales y formulario de modificar
    if (datosPersonales.style.display === "block") {
        datosPersonales.style.display = "none";
        modificarDatos.style.display = "block";
    } else {
        datosPersonales.style.display = "block";
        modificarDatos.style.display = "none";
    }
}
