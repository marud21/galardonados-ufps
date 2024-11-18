<?php

include 'conexion.php';

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $encargado = $_POST['encargado'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Insertar los datos de la convocatoria en la base de datos
    $sql = "INSERT INTO convocatorias (nombre, categoria, descripcion, encargado, fecha_inicio, fecha_fin) 
            VALUES ('$nombre', '$categoria', '$descripcion', '$encargado', '$fecha_inicio', '$fecha_fin')";

    if ($conn->query($sql) === TRUE) {
        echo "Convocatoria creada exitosamente.";
        header("refresh:3;url=../vista/estadoconvocatoria.php"); 
    } else {
        echo "Error al crear la convocatoria: " . $conn->error;
    }
}

$conn->close();

?>