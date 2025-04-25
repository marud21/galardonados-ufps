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
$sql = "SELECT c.id, c.nombre, c.categoria, c.descripcion, c.fecha_inicio, c.fecha_fin
        FROM convocatorias c
        INNER JOIN usuarios_convocatorias uc ON c.id = uc.id_convocatoria
        WHERE uc.id_usuario = $idUsuario";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["nombre_categoria"] . "</td> 
                <td>" . $row["descripcion"] . "</td>
                <td>" . $row["nombre_encargado"] . " " . $row["apellido_encargado"] . "</td> 
                <td>" . $row["fecha_inicio"] . "</td>
                <td>" . $row["fecha_fin"] . "</td>
                <td>
                    <a href='../vista/inscritosconvocatoria.php?id=" . $row["id"] . "' class='button'>Inscritos</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay convocatorias disponibles.</td></tr>";
}

$conn->close();
?>
