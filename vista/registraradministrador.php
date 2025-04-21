<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/convocatoria.css">
  <script src="../modelo/funciones.js"></script> 
</head>
<body>

  <header>
    <div class="container">
      <div class="header-content">
        <img src="../Img/logo_ufps.jpg" alt="Logo de la Universidad" class="logo">
        <div class="header-right">
          <h1>Registrar administrador</h1>
        </div>
      </div>
    </div>
  </header>

  <main class="form-container">

  <section class="form-box">
      <div class="container">
            <h2>Registrar Administrador</h2>
            <form action="../control/registroadmin.php" method="post"> 
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group"> 

                    <label for="documento">Documento:</label>
                    <input type="text" id="documento" name="documento" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                <input type="submit" value="Registrar" class="button">
            </form>
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
