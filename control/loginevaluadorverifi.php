<?php

session_start(); // Iniciar la sesión
include 'conexion.php';

$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario']; // Obtener el nombre de usuario
    $contrasena = $_POST['contrasena'];

    // Consulta para obtener la contraseña del evaluador
    $sql = "SELECT * FROM evaluadores WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $contrasenaHash = $row['contrasena'];

        // Verificar la contraseña
        if (password_verify($contrasena, $contrasenaHash)) {
            // Inicio de sesión exitoso
            $_SESSION['evaluador_id'] = $row['id']; // Guardar el ID del evaluador en la sesión
            $_SESSION['evaluador_usuario'] = $row['usuario']; // Guardar el usuario del evaluador en la sesión
            
            // Puedes agregar otras variables de sesión si las necesitas

            echo "Acceso concedido!";
            // Redirigir a la página principal del evaluador
            header("refresh:3;url=../vista/principalevaluador.php"); // Cambia la URL de redirección
        } else {
            // Contraseña incorrecta
            echo "Error: Contraseña incorrecta.";
        }
    } else {
        // Evaluador no encontrado
        echo "Error: Evaluador no encontrado.";
    }
}

$conn->close();

?>