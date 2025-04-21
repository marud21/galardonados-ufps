<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_email'])) {
    header("Location: logingraduado.html"); // Reemplazar con la URL de tu página de inicio de sesión
    exit();
}

// Obtener la información del usuario de la sesión
$nombreUsuario = $_SESSION['usuario_nombre'];
$cedulaUsuario = $_SESSION['usuario_cedula'];
$emailUsuario = $_SESSION['usuario_email'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Convocatorias</title>
  <link rel="stylesheet" href="/docs/css/styles.css">
  <link rel="stylesheet" href="/docs/css/convocatoria.css">
</head>
<body>

  <header>
    <div class="container">
      <div class="header-content">
        <img src="/docs/Img/logo_ufps.jpg" alt="Logo de la Universidad" class="logo">
        <div class="header-right">
          <h1>Sistema de Reconocimiento de Premios</h1>
          <nav>
            <div class="dropdown">
              <button class="dropbtn">&#9776;</button>
              
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <main>
    <section class="manage-convocatorias">
      <div class="container">
        <h2>Mis Convocatorias</h2>
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
              <!--<th>Acciones</th>-->
            </tr>
          </thead>

          <tbody>
            <?php 
            include '../control/usuaconvregistro.php'; 
            ?>          
          </tbody>
        </table>
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

  <div id="overlay" class="overlay"></div>
  <div id="notificationForm" class="notification-form">
    <h3>Formulario de Registro</h3>
    <form id="formRegistro" action="../control/registrarusuarioconvocatoria.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="idConvocatoria" id="idConvocatoria">
      <label for="nombreConvocado">Nombre Completo:</label>
      <input type="text" id="nombreConvocado" name="nombreConvocado" value="<?php echo $nombreUsuario; ?>" required><br><br>
      <label for="cedulaConvocado">Cedula:</label>
      <input type="text" id="cedulaConvocado" name="cedulaConvocado" value="<?php echo $cedulaUsuario; ?>" required><br><br>
      <label for="emailConvocado">Correo electrónico:</label>
      <input type="email" id="emailConvocado" name="emailConvocado" value="<?php echo $emailUsuario; ?>" required><br><br>

      <!--<div class="form-group">
        <label for="documentos">Subir documentos</label>
        <input type="file" id="documento" name="documento" accept=".pdf,.doc,.docx" multiple>
      </div>-->
      
      <button type="submit" class="button">Enviar</button>
      <button type="button" class="button" onclick="cerrarFormulario()">Cerrar</button>
    </form>
  </div>

  <script src="../modelo/funciones.js"></script> 
</body>
</html>