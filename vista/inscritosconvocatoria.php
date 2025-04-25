<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscritos a Convocatorias</title>
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
                <a href="../vista/principalevaluador.php">Volver</a>
                <a href="#"></a>
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
                <table>
                    <h2></h2>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../control/obtenerinscritos.php'; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <aside class="sidebar"> 
    <a href="../vista/principalevaluador.php">Mi perfil</a>
    <!--<a href="crearconvocatoria.php">Crear Convocatoria</a>
    <a href="registrarevaluador.php">Evaluadores</a>
    <a href="estadoconvocatoria.php">Convocatorias Disponibles</a>
    <a href="../modelo/cerrarsesion.php">Cerrar sesión</a>-->
  </aside>

  <footer>
    <div class="container">
      <p>&copy; 2023 Universidad Francisco de Paula Santander</p>
    </div>
  </footer>


</body>
</html>
