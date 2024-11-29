<?php

session_start(); // Iniciar la sesión
include 'conexion.php';

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            // Inicio de sesión exitoso
            $_SESSION['usuario_id'] = $row['id']; // Guardar el ID del usuario en la sesión
            $_SESSION['usuario_email'] = $row['email']; // Guardar el email del usuario en la sesión
            $_SESSION['usuario_nombre'] = $row['nombre']; // Guardar el nombre del usuario
            $_SESSION['usuario_cedula'] = $row['cedula']; // Guardar la cédula del usuario 
            // Puedes agregar otras variables de sesión si las necesitas

            echo "Acceso concedido!";
            header("refresh:3;url=../vista/perfilgraduado.php");
        } else {
            // Contraseña incorrecta
            echo "Error: Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        echo "Error: Usuario no encontrado.";
    }
}

$conn->close();

?>