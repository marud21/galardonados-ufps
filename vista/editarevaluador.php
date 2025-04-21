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
            <title>Editar evaluadores</title>
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
                            <div class="dropdown">
                                <button class="dropbtn">&#9776;</button>
                                <div class="dropdown-content">
                                    <a href="#">Iniciar sesión</a>
                                    <a href="#">Registrarse</a>
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

                // Consulta para obtener los datos del evaluador
                $sql = "SELECT * FROM evaluadores WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
        ?>

        <main class="form-container">
            <div class="form-box">
                <h3>Registrar Evaluador</h3>
                <form id="formRegistrarEvaluador" action="../control/editarevaluador.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="<?php echo $row['usuario']; ?>" required><br><br>
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>" required><br><br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required><br><br>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required><br><br>
                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" value="<?php echo $row['documento']; ?>" required><br><br>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" value="<?php echo $row['contrasena']; ?>" required><br><br>
                    <div class="form-group">
                        <label for="cargo">Cargo:</label>
                        <select id="cargo" name="cargo" required>
                            <?php
                            // Consulta para obtener los cargos
                            $sqlCargos = "SELECT * FROM cargos";
                            $resultCargos = $conn->query($sqlCargos);

                            // Generar las opciones del select
                            while ($rowCargo = $resultCargos->fetch_assoc()) {
                                $selected = ($row['id_cargo'] == $rowCargo['id']) ? 'selected' : '';
                                echo "<option value='" . $rowCargo["id"] . "' $selected>" . $rowCargo["nombre"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="programa">Programa:</label>
                        <select id="programa" name="programa" required>
                            <?php
                            // Consulta para obtener los programas
                            $sqlProgramas = "SELECT * FROM programas";
                            $resultProgramas = $conn->query($sqlProgramas);

                            // Generar las opciones del select
                            while ($rowPrograma = $resultProgramas->fetch_assoc()) {
                                $selected = ($row['id_programa'] == $rowPrograma['id']) ? 'selected' : '';
                                echo "<option value='" . $rowPrograma["id"] . "' $selected>" . $rowPrograma["nombre"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="button" value="Actualizar">
                    <button type="button" class="button" onclick="window.location.href = 'registrarevaluador.php'">Volver</button>
                </form>
            </div>
        </main> 

        <?php
        } else {
            echo "<p>No se encontró ningun Evaluador con ese ID.</p>";
        }
    } else {
        echo "<p>ID de Evaluador no especificado.</p>";
    }

    $conn->close();
    ?>


        <footer>
            <div class="container">
                <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
            </div>
        </footer>

        <script src="../modelo/funciones.js"></script>
        </body>
        </html>
