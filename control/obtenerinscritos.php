<?php
include 'conexion.php';
$conn = conexion();

if (isset($_GET['id'])) {
    $idConvocatoria = $_GET['id'];

    // Obtener el nombre de la convocatoria
    $sqlNombre = "SELECT nombre FROM convocatorias WHERE id = $idConvocatoria";
    $resultNombre = $conn->query($sqlNombre);
    $nombreConvocatoria = $resultNombre->fetch_assoc()['nombre'];


    // Consulta SQL para obtener los usuarios inscritos en la convocatoria
    $sql = "SELECT u.id, u.nombre, u.apellido, u.cedula, u.email
            FROM usuarios u
            INNER JOIN usuarios_convocatorias uc ON u.id = uc.id_usuario
            WHERE uc.id_convocatoria = $idConvocatoria";

    $result = $conn->query($sql);
    // Mostrar el nombre de la convocatoria
    echo "<h2>Convocatoria: " . $nombreConvocatoria . "</h2>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido"] . "</td>";
            echo "<td>" . $row["cedula"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>";
            // Aquí se debe agregar la lógica para mostrar los documentos del usuario
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No hay usuarios inscritos en esta convocatoria.";
    }
}

$conn->close();
?>