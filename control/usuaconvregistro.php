<?php
//session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: logingraduado.html");
    exit();
}

// Incluir el archivo de conexión
include 'conexion.php';
$conn = conexion();

// Obtener el ID del usuario de la sesión
$idUsuario = $_SESSION['usuario_id'];

// Consulta SQL para obtener las convocatorias del usuario
$sql = "SELECT c.id, c.nombre, c.categoria, c.descripcion, c.fecha_inicio, c.fecha_fin, uc.id AS id_uc 
        FROM convocatorias c
        INNER JOIN usuarios_convocatorias uc ON c.id = uc.id_convocatoria
        WHERE uc.id_usuario = $idUsuario";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["categoria"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["fecha_inicio"] . "</td>";
        echo "<td>" . $row["fecha_fin"] . "</td>";
        //echo "<td>" . $row["documento"] . "</td>";
        echo "<td><button onclick='eliminarregistroconvocatoria(" . $row["id_uc"] . ")'>Eliminar</button></td>"; 
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "El usuario no está registrado en ninguna convocatoria.";
}

$conn->close();
?>