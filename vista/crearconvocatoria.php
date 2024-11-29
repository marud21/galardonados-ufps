<?php
session_start();

// Verificar si el evaluador ha iniciado sesión
if (!isset($_SESSION['administrador_id'])) { 
    header("Location: loginadmin.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Convocatoria</title>
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
                        <div class="dropdown">
                            <button class="dropbtn">&#9776;</button>
                            <div class="dropdown-content">
                                <a href="estadoconvocatoria.php">Convocatorias</a>
                                <!--<a href="/vista/registro.html">Registrarse</a>-->
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="form-container">
        <section class="form-box">
            <form id="formulario-convocatoria" action="/control/registrarconvocatoria.php" method="post">
                <h2>Crear Convocatoria para Egresados</h2>
                <div class="form-group">
                    <label for="nombre">Nombre de la convocatoria</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria" required>
                    <?php
                    // Conexión a la base de datos (si es necesario)
                    include 'C:/xampp/htdocs/galardonados-ufps/control/conexion.php';
                    $conn = conexion();

                    // Consulta para obtener las categorías
                    $sqlCategorias = "SELECT * FROM categorias";
                    $resultCategorias = $conn->query($sqlCategorias);

                    // Generar las opciones del select
                    while ($rowCategoria = $resultCategorias->fetch_assoc()) {
                        echo "<option value='" . $rowCategoria["id"] . "'>" . $rowCategoria["nombre"] . "</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="encargado">Encargado/a de la convocatoria</label>
                    <select id="encargado" name="encargado" required>
                        <?php

                        // Consulta para obtener los evaluadores
                        $sqlEvaluadores = "SELECT id, nombre, apellido FROM evaluadores";
                        $resultEvaluadores = $conn->query($sqlEvaluadores);

                        // Generar las opciones del select
                        while ($rowEvaluador = $resultEvaluadores->fetch_assoc()) {
                            echo "<option value='" . $rowEvaluador["id"] . "'>" . $rowEvaluador["nombre"] . " " . $rowEvaluador["apellido"] . "</option>";
                        }
                        // Cerrar la conexión a la base de datos
                        $conn->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input class="input-fecha fecha_inicio" type="date" id="fecha_inicio" name="fecha_inicio" required>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de fin</label>
                    <input class="input-fecha fecha_fin" type="date" id="fecha_fin" name="fecha_fin" required>
                </div>
                <!--<div class="form-group">
                    <label for="documento">Subir documento (PDF):</label>
                    <input type="file" id="documento" name="documento" accept=".pdf" required>
                </div>-->
                <input type="submit" class="button">
                <button type="button" class="button" onclick="window.location.href = 'estadoconvocatoria.php'">Volver</button>
            </form>
        </section>
    </main>

    <aside class="sidebar"> 
        <a href="#">Mi perfil</a>
        <a href="crearconvocatoria.php">Crear Convocatoria</a>
        <a href="registrarevaluador.php">Evaluadores</a>
        <a href="estadoconvocatoria.php">Convocatorias Disponibles</a>
        <a href="../modelo/cerrarsesion.php">Cerrar sesión</a>
    </aside>

    <footer>
        <div class="container">
            <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
        </div>
    </footer>
</body>
</html>
