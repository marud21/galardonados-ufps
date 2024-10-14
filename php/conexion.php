<?php
$servername = "localhost";
$username = " root@localhost";
$password = "";
$dbname = "usuarios_db";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>