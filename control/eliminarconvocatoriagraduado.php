<?php
include 'conexion.php';
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM usuarios_convocatorias WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Convocatoria eliminada exitosamente.";
    } else {
        echo "Error al eliminar la convocatoria: " . $conn->error;
    }
}

$conn->close();
?>