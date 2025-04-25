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
  <title>Estado de Convocatorias</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="header-content">
        <img src="../Img/logo_ufps.jpg" alt="Logo de la Universidad" class="logo">
        <div class="header-right">
          <h1>Sistema de Reconocimiento de Premios</h1>
        </div>
      </div>
    </div>
  </header>

  <main>
                <section class="manage-convocatorias">
                <div class="container">
                <h2>Convocatorias disponibles</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Encargado</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php include '../control/obtenerconvocatorias.php'; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <aside class="sidebar"> 
    <a href="#">Mi perfil</a>
    <a href="../vista/crearconvocatoria.php">Crear Convocatoria</a>
    <a href="../vista/registrarevaluador.php">Evaluadores</a>
    <a href="../vista/estadoconvocatoria.php">Convocatorias Disponibles</a>
    <a href="../modelo/cerrarsesion.php">Cerrar sesión</a>
  </aside>

  <footer>
    <div class="container">
      <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
    </div>
  </footer>

  <script src="../modelo/funciones.js"></script>

</body>
</html>
