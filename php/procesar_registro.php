<?php

include 'conexion.php';

$conn = conexion();

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los datos del formulario (ejemplo)
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo "Error: Todos los campos son obligatorios.";
    } else {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hashear la contraseña
        $contrasena_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, apellido, email, contrasena) 
                VALUES ('$nombre', '$apellido', '$email', '$contrasena_hash')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso! Redirigiendo...";
            header("refresh:3;url=/login.php"); 
        } else {
            // Manejar el error de duplicado
            if ($conn->errno == 1062) { 
                echo "Error: El correo electrónico ya está en uso.";
            } else {
                echo "Error al registrar el usuario: " . $conn->error; 
            }
        }
    }
}

$conn->close();

?>