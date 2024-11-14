// Seleccionar el formulario y agregar un evento 'submit'
document.querySelector(".convocatoria-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir el envío del formulario por defecto

    // Obtener los valores de los campos del formulario
    const nombre = document.getElementById("nombre").value;
    const categoria = document.getElementById("categoria").value;
    const descripcion = document.getElementById("descripcion").value;
    const encargado = document.getElementById("encargado").value;
    const fechaInicio = document.getElementById("fecha_inicio").value;
    const fechaFin = document.getElementById("fecha_fin").value;

    // Crear un objeto de convocatoria con los datos obtenidos
    const nuevaConvocatoria = {
        nombre,
        categoria,
        descripcion,
        encargado,
        fechaInicio,
        fechaFin,
        estado: "Abierta" // Estado inicial de la convocatoria
    };

    // Obtener las convocatorias existentes de localStorage o inicializar como un array vacío
    let convocatorias = JSON.parse(localStorage.getItem("convocatorias")) || [];
    // Añadir la nueva convocatoria al array
    convocatorias.push(nuevaConvocatoria);
    // Guardar las convocatorias actualizadas en localStorage
    localStorage.setItem("convocatorias", JSON.stringify(convocatorias));

    // Redirigir a la página de gestión de convocatorias
    window.location.href = "estadoconvocatoria.html";
});
