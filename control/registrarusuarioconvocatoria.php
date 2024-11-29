<?php

include 'conexion.php';
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    print_r($_POST); // Mostrar los valores de $_POST

    $nombreConvocado = $_POST["nombreConvocado"];
    $cedulaConvocado = $_POST["cedulaConvocado"];
    $emailConvocado = $_POST["emailConvocado"];
    $idConvocatoria = $_POST["idConvocatoria"];

    // Obtener la información del archivo subido
    $documento = $_FILES["documento"];

    // Guardar el archivo en la ubicación deseada (reemplaza con tu lógica)
    $rutaDestino = "C:\xampp\htdocs\galardonados-ufps\archivos" . $documento["name"];
    move_uploaded_file($documento["tmp_name"], $rutaDestino);

    // Buscar el ID del usuario en la base de datos
    $sql = "SELECT id FROM usuarios WHERE nombre='$nombreConvocado' AND cedula='$cedulaConvocado' AND email='$emailConvocado'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row["id"];

        // Insertar datos en la tabla 'usuarios_convocatorias' (incluyendo la ruta del documento)
    $sql = "INSERT INTO usuarios_convocatorias (id_usuario, id_convocatoria, documento) 
    VALUES ($idUsuario, $idConvocatoria, '$rutaDestino')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso!";
            // Redirigir a la página de éxito
            header("Location: ../vista/convograregis.php");
            exit();
        } else {
            echo "Error al registrar en la convocatoria: " . $conn->error;
        }
    } else {
        echo "No se encontró ningún usuario con esos datos.";
    }
}

$conn->close();

?>