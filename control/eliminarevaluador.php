<?php
include 'conexion.php';

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM evaluadores WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Evaluador eliminada exitosamente.";
    } else {
        echo "Error al eliminar evaluador: " . $conn->error;
    }
}

$conn->close();
?>