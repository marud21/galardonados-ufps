<?php
include 'conexion.php';

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $encargado = $_POST['encargado'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $sql = "UPDATE convocatorias SET 
            nombre = '$nombre',
            categoria = '$categoria',
            descripcion = '$descripcion',
            encargado = '$encargado',
            fecha_inicio = '$fecha_inicio',
            fecha_fin = '$fecha_fin'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Convocatoria actualizada exitosamente.";
        header("refresh:3;url=../vista/estadoconvocatoria.php"); 
    } else {
        echo "Error al actualizar la convocatoria: " . $conn->error;
    }
}

$conn->close();
?>