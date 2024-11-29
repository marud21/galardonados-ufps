<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Convocatorias</title>
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/convocatoria.css">
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
        <h2>Convocatorias</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Categoría</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            include '../control/usuarioconvocatoria.php'; 
            ?>          
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
    </div>
  </footer>

  <div id="overlay" class="overlay"></div>
  <div id="notificationForm" class="notification-form">
    <h3>Formulario de Registro</h3>
  <form id="formRegistro" action="/control/registrarusuarioconvocatoria.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="idConvocatoria" id="idConvocatoria"> 
  <label for="nombreConvocado">Nombre Completo:</label>
  <input type="text" id="nombreConvocado" name="nombreConvocado" required><br><br>
  <label for="cedulaConvocado">Cedula:</label>
  <input type="text" id="cedulaConvocado" name="cedulaConvocado" required><br><br>
  <label for="emailConvocado">Correo electrónico:</label>
  <input type="email" id="emailConvocado" name="emailConvocado" required><br><br>

  <div class="form-group">
    <label for="documentos">Subir documentos</label>
    <input type="file" id="documentos" name="documentos" accept=".pdf,.doc,.docx" multiple>
  </div>
  <button type="submit" class="button">Enviar</button>
  <button type="button" class="button" onclick="cerrarFormulario()">Cerrar</button>
</form>
  </div>

  <script src="../modelo/funciones.js"></script> 
</body>
</html>