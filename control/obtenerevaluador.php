<?php
// Conexión a la base de datos
include 'conexion.php';
$conn = conexion();

// Consulta para obtener los evaluadores
$sql = "SELECT e.id, e.usuario, e.codigo, e.nombre, e.apellido, e.documento, e.email, c.nombre AS cargo, p.nombre AS programa
        FROM evaluadores e
        INNER JOIN cargos c ON e.id_cargo = c.id
        INNER JOIN programas p ON e.id_programa = p.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["documento"] . "</td>";
        echo "<td>" . $row["codigo"] . "</td>";
        echo "<td>" . $row["usuario"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["programa"] . "</td>";
        echo "<td>" . $row["cargo"] . "</td>";
        echo "<td>";

        // Botón de editar
        echo "<button class='button' onclick=\"window.location.href='/vista/editarevaluador.php?id=" . $row["id"] . "'\">Editar</button>";

        // Botón de eliminar
        echo "<button class='button' onclick='eliminarEvaluador(" . $row["id"] . ")'>Eliminar</button>";

        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No hay evaluadores disponibles.</td></tr>";
}

$conn->close();
?>


