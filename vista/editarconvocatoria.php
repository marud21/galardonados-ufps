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
    <title>Editar Convocatoria</title>
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
                                <a href="/html/Login.html">Iniciar sesión</a>
                                <a href="/html/registro.html">Registrarse</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <?php

    include 'C:/xampp/htdocs/galardonados-ufps/control/conexion.php';
    $conn = conexion();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para obtener la convocatoria y el nombre del encargado
        $sql = "SELECT c.*, e.nombre AS nombre_encargado, e.apellido AS apellido_encargado 
                FROM convocatorias c
                LEFT JOIN evaluadores e ON c.encargado = e.id 
                WHERE c.id = $id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <main class="form-container">
            <section class="form-box">
                <form id="formulario-convocatoria" action="/control/actualizar_convocatoria.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <h2>Editar Convocatoria para Egresados</h2>
                    <div class="form-group">
                        <label for="nombre">Nombre de la convocatoria</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select id="categoria" name="categoria" required>
                            <?php
                            // Consulta para obtener las categorías
                            $sqlCategorias = "SELECT * FROM categorias";
                            $resultCategorias = $conn->query($sqlCategorias);

                            // Generar las opciones del select
                            while ($rowCategoria = $resultCategorias->fetch_assoc()) {
                                $selected = ($row["categoria"] == $rowCategoria["id"]) ? "selected" : ""; // Marcar la opción actual como seleccionada
                                echo "<option value='" . $rowCategoria["id"] . "' " . $selected . ">" . $rowCategoria["nombre"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Logros y Méritos</label>
                        <textarea id="descripcion" name="descripcion" required><?php echo $row["descripcion"]; ?></textarea>
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
                            $selected = ($row["encargado"] == $rowEvaluador["id"]) ? "selected" : ""; // Marcar la opción actual como seleccionada
                            echo "<option value='" . $rowEvaluador["id"] . "'>" . $rowEvaluador["nombre"] . " " . $rowEvaluador["apellido"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input class="input-fecha fecha_inicio" type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row["fecha_inicio"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input class="input-fecha fecha_fin" type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $row["fecha_fin"]; ?>" required>
                    </div>
                    <input type="submit" class="button" value="Actualizar">
                    <button type="button" class="button" onclick="window.location.href = 'estadoconvocatoria.php'">Volver</button>
                </form>
            </section>
    </main>


            <?php
        } else {
            echo "<p>No se encontró ninguna convocatoria con ese ID.</p>";
        }
    } else {
        echo "<p>ID de convocatoria no especificado.</p>";
    }

    $conn->close();
    ?>

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