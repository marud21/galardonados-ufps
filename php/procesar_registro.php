<?php
include "conexion.php";

// Obtiene los datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contrasena = $_POST["password"]; // ¡Encripta la contraseña antes de guardarla!

// Prepara la consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, email, contrasena) 
        VALUES ('$nombre', '$apellido', '$email', '$contrasena')";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
  // Redirige a registro.html con el parámetro de éxito
  header("Location: registro.html?exito=1"); 
  exit(); // Detiene la ejecución del script
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>