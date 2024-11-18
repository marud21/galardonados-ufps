function eliminarConvocatoria(id) {
    if (confirm("¿Estás seguro de que quieres eliminar esta convocatoria?")) {
        // Crear un objeto XMLHttpRequest
        var xhttp = new XMLHttpRequest();

        // Definir la función que se ejecutará cuando se reciba la respuesta del servidor
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Actualizar la tabla de convocatorias
                // Puedes recargar la página o eliminar la fila de la tabla dinámicamente
                location.reload(); 
            }
        };

        // Abrir una solicitud POST al archivo PHP que eliminará la convocatoria
        xhttp.open("POST", "../control/eliminarconvocatoria.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Enviar la solicitud con el ID de la convocatoria a eliminar
        xhttp.send("id=" + id);
    }
}