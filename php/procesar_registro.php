<?php

// Incluir el archivo de conexión
require_once 'conexion.php';

// Obtener la conexión
$conn = conexion(); 

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, email, password) 
        VALUES ('$nombre', '$apellido', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();

?>