<?php
session_start(); // Iniciar la sesión
session_destroy(); // Destruir todas las variables de sesión
header("Location: ../vista/login.html"); // Redirigir a la página de inicio de sesión
exit();
?>