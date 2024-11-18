<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Convocatorias</title>
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
  <script src="../modelo/funciones.js"></script> </body>
</body>
</html>
