<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: logingraduado.html");
    exit();
}

// Incluir el archivo de conexión
include dirname(__DIR__).'/control/conexion.php';
$conn = conexion();

// Obtener el ID del usuario de la sesión
$idUsuario = $_SESSION['usuario_id'];

// Consulta para obtener los datos del usuario
$sqlUsuario = "SELECT * FROM usuarios WHERE id = $idUsuario";
$resultUsuario = $conn->query($sqlUsuario);

if ($resultUsuario->num_rows > 0) {
    $rowUsuario = $resultUsuario->fetch_assoc();
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
        <section class="principal-container">
            <div class="container1">
                <h2>Información de Perfil</h2>

                <p>Nombre: <?php echo $rowUsuario["nombre"]; ?></p>
                <p>Apellido: <?php echo $rowUsuario["apellido"]; ?></p>
                <p>Email: <?php echo $rowUsuario["email"]; ?></p>
                <p>Documento de identidad: <?php echo $rowUsuario["cedula"]; ?></p>
            </div>
        </section>
    </main>

    <aside class="sidebar"> 
    <a href="#">Mi perfil</a>
    <a href="../vista/verconvocatoria.php">Ver Convocatorias</a>
    <a href="../vista/convograregis.php">Mis Convocatorias</a>
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
} else {
    echo "No se encontró ningún usuario con ese ID.";
}

$conn->close();
?>