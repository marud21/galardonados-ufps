<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estado de Convocatorias</title>
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
        <section class="convocatorias">
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

  <footer>
    <div class="container">
      <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
    </div>
  </footer>

  <!-- Fondo borroso y formulario -->
  <div id="overlay" class="overlay"></div>
  <div id="notificationForm" class="notification-form">
    
  <h3>Formulario</h3>

    <form action="/control/obtenerconvocatoria.php" method="post" id="formRegistro">

    <label for="nombre">Nombre de la convocatoria</label>
    <input type="text" id="nombre" name="nombre" required value="">

    <label for="categoria">Categoría</label>
    <select id="categoria" name="categoria" required value="">
      <option value="">Seleccione una categoría</option>
      <option value="investigacion">Investigación</option>
      <option value="merito_academico">Mérito Académico</option>
      <option value="proyectos">Proyectos</option>
    </select>

    <label for="descripcion">Logros y Méritos</label>
    <textarea id="descripcion" name="descripcion" rows="5" required value=""></textarea>

    <label for="encargado">Encargado/a de la convocatoria</label>
    <input type="text" id="encargado" name="encargado" required value="">

    <label for="fecha_inicio">Fecha de inicio</label>
    <input class="input-fecha fecha_inicio" type="date" id="fecha_inicio" name="fecha_inicio" required value="">

    <label for="fecha_fin">Fecha de fin</label>
    <input class="input-fecha fecha_fin" type="date" id="fecha_fin" name="fecha_fin" required value="">

    <input type="submit" class="button" name="enviar" value="ACTUALIZAR">
    <button type="button" class="button" onclick="cerrarFormulario()">Cerrar</button>
    </form>
  </div>

  <script src="../modelo/funciones.js"></script>
</body>
</html>
