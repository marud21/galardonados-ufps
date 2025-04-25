<?php
include 'conexion.php';
$conn = conexion();

$sql = "SELECT c.*, e.nombre AS nombre_encargado, e.apellido AS apellido_encargado, cat.nombre AS nombre_categoria
        FROM convocatorias c
        LEFT JOIN evaluadores e ON c.encargado = e.id
        LEFT JOIN categorias cat ON c.categoria = cat.id"; 

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
                    <button class='button' onclick='eliminarconvocatoria(" . $row["id"] . ")'>Eliminar</button>
                    <button class='button' onclick=\"window.location.href='../vista/editarconvocatoria.php?id=" . $row["id"] . "'\">Editar</button>
                    <a href='../vista/inscritosconvocatoria.php?id=" . $row["id"] . "' class='button'>Inscritos</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay convocatorias disponibles.</td></tr>";
}

$conn->close();
?>