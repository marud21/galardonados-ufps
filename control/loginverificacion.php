<?php

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
            echo "Acceso concedido!";
            // Aquí puedes redirigir al usuario a la página principal o a su perfil
            // header("Location: /pagina_principal.php");
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