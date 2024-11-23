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

      $sql = "SELECT * FROM convocatorias WHERE id = $id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
  ?>
  <section class="create-convocatoria">
            <form id="formulario-convocatoria" action="/control/actualizar_convocatoria.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    <h2>Crear Convocatoria para Egresados</h2>
                    <div class="form-group">
                        <label for="nombre">Nombre de la convocatoria</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required>
                    </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="investigacion" <?php if ($row["categoria"] == 'investigacion') echo 'selected'; ?>>Investigación</option>
                        <option value="merito_academico" <?php if ($row["categoria"] == 'merito_academico') echo 'selected'; ?>>Mérito Académico</option>
                        <option value="proyectos" <?php if ($row["categoria"] == 'proyectos') echo 'selected'; ?>>Proyectos</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Logros y Méritos</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo $row["descripcion"]; ?></textarea>                </div>
                <div class="form-group">
                    <label for="encargado">Encargado/a de la convocatoria</label>
                    <input type="text" id="encargado" name="encargado" value="<?php echo $row["encargado"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input class="input-fecha fecha_inicio" type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $row["fecha_inicio"]; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de fin</label>
                    <input class="input-fecha fecha_fin" type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $row["fecha_fin"]; ?>" required>
                </div>
                <!--<div class="form-group">
                    <label for="documento">Subir documento (PDF):</label>
                    <input type="file" id="documento" name="documento" accept=".pdf" required>
                </div>-->
                <input type="submit" class="button" value="Actualizar">
            </form>
        </section>

  <?php
      } else {
          echo "<p>No se encontró ninguna convocatoria con ese ID.</p>";
      }
  } else {
      echo "<p>ID de convocatoria no especificado.</p>";
  }

  $conn->close();

  ?>

<main>
        
    </main>

    
    <footer>
        <div class="container">
            <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
        </div>
    </footer>
</body>
</html>
