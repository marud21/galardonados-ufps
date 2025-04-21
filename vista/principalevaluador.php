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

// Obtener el ID del usuario de la sesión
$idUsuario = $_SESSION['evaluador_id'];

// Consulta para obtener los datos del usuario
$sqlUsuario = "SELECT * FROM evaluadores WHERE id = $idUsuario";
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
                <p>Documento de identidad: <?php echo $rowUsuario["documento"]; ?></p> 
                <p>Código: <?php echo $rowUsuario["codigo"]; ?></p>

                <?php
                // Obtener el cargo del evaluador
                $sqlCargo = "SELECT nombre FROM cargos WHERE id = " . $rowUsuario["id_cargo"];
                $resultCargo = $conn->query($sqlCargo);
                $rowCargo = $resultCargo->fetch_assoc();
                echo "<p>Cargo: " . $rowCargo["nombre"] . "</p>";

                // Obtener el programa del evaluador
                $sqlPrograma = "SELECT nombre FROM programas WHERE id = " . $rowUsuario["id_programa"];
                $resultPrograma = $conn->query($sqlPrograma);
                $rowPrograma = $resultPrograma->fetch_assoc();
                echo "<p>Programa: " . $rowPrograma["nombre"] . "</p>";
                ?>
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
} else {
    echo "No se encontró ningún usuario con ese ID.";
}

$conn->close();
?>