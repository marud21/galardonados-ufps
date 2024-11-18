document.addEventListener("DOMContentLoaded", function() {
    // Obtener las convocatorias guardadas en localStorage
    let convocatorias = JSON.parse(localStorage.getItem("convocatorias")) || [];

    // Seleccionar el cuerpo de la tabla
    const tablaBody = document.querySelector("table tbody");

    // Limpiar el contenido de la tabla para evitar duplicados
    tablaBody.innerHTML = "";

    // Añadir cada convocatoria a la tabla
    convocatorias.forEach(function(convocatoria, index) {
        const fila = document.createElement("tr");

        // Crear el contenido de la fila con los datos de la convocatoria
        fila.innerHTML = `
            <td>${convocatoria.nombre}</td>
            <td>${convocatoria.categoria}</td>
            <td>${convocatoria.fechaInicio}</td>
            <td>${convocatoria.fechaFin}</td>
            <td>${convocatoria.estado}</td>
            <td>
                <button class="button" data-index="${index}">Editar</button>
                <button class="button delete" data-index="${index}">Eliminar</button>
                <a href="informacion_convocatoria.html" class="button">Información</a>
            </td>
        `;

        // Añadir la fila al cuerpo de la tabla
        tablaBody.appendChild(fila);
    });

    // Agregar el evento de eliminación
    const botonesEliminar = document.querySelectorAll(".delete");
    botonesEliminar.forEach(function(boton) {
        boton.addEventListener("click", function() {
            const index = boton.getAttribute("data-index"); // Obtener el índice de la convocatoria
            eliminarConvocatoria(index);
        });
    });

    // Función para eliminar una convocatoria
    function eliminarConvocatoria(index) {
        let convocatorias = JSON.parse(localStorage.getItem("convocatorias")) || [];
        // Eliminar la convocatoria del array usando el índice
        convocatorias.splice(index, 1);
        // Guardar las convocatorias actualizadas en localStorage
        localStorage.setItem("convocatorias", JSON.stringify(convocatorias));
        // Actualizar la tabla
        location.reload(); // Recargar la página para reflejar el cambio
    }
});
