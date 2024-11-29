<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_email'])) {
    header("Location: logingraduado.html"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

// Conexión a la base de datos (si es necesario)
include 'C:/xampp/htdocs/galardonados-ufps/control/conexion.php';
$conn = conexion();

// Obtener la información del usuario de la sesión
$emailUsuario = $_SESSION['usuario_email'];
$idUsuario = $_SESSION['usuario_id']; // Obtener el ID del usuario de la sesión


// Consulta para obtener las convocatorias a las que se ha inscrito el usuario
$sqlConvocatorias = "SELECT c.* 
                     FROM convocatorias c
                     INNER JOIN usuarios_convocatorias uc ON c.id = uc.id_convocatoria
                     WHERE uc.id_usuario = $idUsuario";
$resultConvocatorias = $conn->query($sqlConvocatorias);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <img src="/Img/logo_ufps.jpg" alt="Logo de la Universidad" class="logo">
                <div class="header-right">
                    <h1>Sistema de Reconocimiento de Premios</h1>
                    <nav>
                        
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="principal-container">
            <div class="container1">
                <h2>Bienvenido, <?php echo $emailUsuario; ?></h2>

                <h3>Convocatorias inscritas</h3>
                <?php
                if ($resultConvocatorias->num_rows > 0) {
                    while ($rowConvocatoria = $resultConvocatorias->fetch_assoc()) {
                        echo "<p>" . $rowConvocatoria["nombre"] . "</p>";
                        // Mostrar más información de la convocatoria si es necesario
                    }
                } else {
                    echo "<p>No estás inscrito en ninguna convocatoria.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <aside class="sidebar"> 
    <a href="perfilgraduado.php">Mi perfil</a>
    <a href="verconvocatoria.php">Ver convocatorias</a>
    <a href="convograregis.php">Mis convocatorias</a>
    <a href="../modelo/cerrarsesion.php">Cerrar sesión</a>
  </aside>

    <footer>
        <div class="container">
            <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
        </div>
    </footer>
</body>
</html>