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
  <title>Evaluadores</title>
  <link rel="stylesheet" href="/docs/css/styles.css">
  <link rel="stylesheet" href="/docs/css/convocatoria.css">
  <script src="../modelo/funciones.js"></script> 
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

  <main>
    <section class="manage-convocatorias">
      <div class="container">
        <h2>Evaluadores</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Documento</th>
              <th>Codigo</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Programa</th>
              <th>Cargo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              include '../control/obtenerevaluador.php'; 
            ?>          
          </tbody>
        </table>
        <button class="button" onclick="window.location.href = 'mostrarevaluadores.php'">Registrarse</button>
      </div>
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
<!--<script src="../modelo/funciones.js"></script>-->
</body>
</html>