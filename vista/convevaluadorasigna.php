<?php
session_start();

// Verificar si el evaluador ha iniciado sesión
if (!isset($_SESSION['evaluador_id'])) {
    header("Location: loginevaluador.html");
    exit();
}

// Incluir el archivo de conexión
include 'C:/xampp/htdocs/galardonados-ufps/control/conexion.php';
$conn = conexion();

// Obtener el ID del evaluador de la sesión
$idEvaluador = $_SESSION['evaluador_id'];

// Consulta para obtener las convocatorias asignadas al evaluador
$sqlConvocatorias = "SELECT * FROM convocatorias WHERE encargado = $idEvaluador";
$resultConvocatorias = $conn->query($sqlConvocatorias);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Perfil</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <div class="container">
      <div class="header-content">
        <img src="../Img/logo_ufps.jpg" alt="Logo de la Universidad" class="logo">
        <div class="header-right">
          <h1>Sistema de Reconocimiento de Premios</h1>
          <nav>
          </nav>
        </div>
      </div>
    </div>
  </header>
    <main>
        <section class=""><section class="manage-convocatorias">
          <div class="container">
                <h2>Información de Perfil</h2>
                <?php
                // Mostrar la información del perfil del evaluador aquí
                ?>

                <h3>Convocatorias asignadas</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultConvocatorias->num_rows > 0) {
                          while ($rowConvocatoria = $resultConvocatorias->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $rowConvocatoria["id"] . "</td>";
                              echo "<td>" . $rowConvocatoria["nombre"] . "</td>";
                              echo "<td>" . $rowConvocatoria["categoria"] . "</td>";
                              echo "<td>" . $rowConvocatoria["descripcion"] . "</td>";
                              echo "<td>" . $rowConvocatoria["fecha_inicio"] . "</td>";
                              echo "<td>" . $rowConvocatoria["fecha_fin"] . "</td>";
                              // Agregar el botón "Inscritos"
                              echo "<td>
                                      <a href='../vista/inscritosconvocatoria.php?id=" . $rowConvocatoria["id"] . "' class='button'>Inscritos</a>
                                    </td>";
                              echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='7'>No tienes convocatorias asignadas.</td></tr>";
                      }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <aside class="sidebar">
        <a href="principalevaluador.php">Mi perfil</a>
        <!--<a href="verconvocatoria.php"></a>-->
        <a href="convevaluadorasigna.php">Mis convocatorias</a>
        <a href="../modelo/cerrarsesion.php">Cerrar sesión</a>
    </aside>

    <footer>
    <div class="container">
      <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
    </div>
  </footer>
</body>
</html>

<?php
$conn->close();
?>