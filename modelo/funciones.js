function eliminarconvocatoria(id) {
    if (confirm("¿Estás seguro de que quieres eliminar esta convocatoria?" + id)) {
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

function eliminarEvaluador(id) {
  if (confirm("¿Estás seguro de que quieres eliminar este evaluador?")) {
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
      xhttp.open("POST", "../control/eliminarevaluador.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      // Enviar la solicitud con el ID de la convocatoria a eliminar
      xhttp.send("id=" + id);
  }
}

function eliminarregistroconvocatoria(id) {
  if (confirm("¿Estás seguro de que quieres eliminar este evaluador?")) {
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
    xhttp.open("POST", "../control/eliminarconvocatoriagraduado.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar la solicitud con el ID de la convocatoria a eliminar
    xhttp.send("id=" + id);
}
}

function mostrarFormulario(idConvocatoria) {

    // Mostrar la ventana emergente con el formulario.
    document.getElementById("overlay").style.display = "block";
    document.getElementById("notificationForm").style.display = "block";

    // Obtener el ID de la convocatoria del atributo data-id del botón.
    document.getElementById("idConvocatoria").value = idConvocatoria; 
  
    // Verificar si se encontró el ID de la convocatoria.
    if (!idConvocatoria) {
      console.error("Error: No se encontró el ID de la convocatoria en el botón.");
      return;
    }
  
    // Asignar el ID al campo oculto del formulario.
    var idConvocatoriaField = document.getElementById("idConvocatoria");
    if (!idConvocatoriaField) {
      console.error("Error: No se encontró el campo oculto 'idConvocatoria' en el formulario.");
      return;
    }
    idConvocatoriaField.value = idConvocatoria;
  }

  function mostrarFormulariodos() {
    // Mostrar la ventana emergente con el formulario.
    document.getElementById("overlay").style.display = "block";
    document.getElementById("notificationForm").style.display = "block";
  }
  
  function cerrarFormulario() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("notificationForm").style.display = "none";
  }

