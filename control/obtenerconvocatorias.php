<?php
include 'conexion.php';
$conn = conexion();

$sql = "SELECT * FROM convocatorias";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
    
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["categoria"] . "</td>
                <td>" . $row["descripcion"] . "</td>
                <td>" . $row["encargado"] . "</td>
                <td>" . $row["fecha_inicio"] . "</td>
                <td>" . $row["fecha_fin"] . "</td>
                <td>
                    <button class='button' onclick='eliminarConvocatoria(" . $row["id"] . ")'>Eliminar</button>
                    <button class='button' onclick=\"window.location.href='/vista/editarconvocatoria.php?id=" . $row["id"] . "'\">Editar</button>
                    <button class='button'>Inscritos</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No hay convocatorias disponibles.</td></tr>";
}

$conn->close();
?>