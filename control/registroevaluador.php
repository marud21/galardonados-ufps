<?php

include 'conexion.php';
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $documento = $_POST["documento"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"]; // ¡IMPORTANTE! No guardes la contraseña en texto plano.
    $cargo = $_POST["cargo"];
    $programa = $_POST["programa"];

    // Hash de la contraseña (reemplaza esto con tu método de hashing preferido)
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO evaluadores (usuario, codigo, nombre, apellido, documento, email, contrasena, id_cargo, id_programa) 
            VALUES ('$usuario', '$codigo', '$nombre', '$apellido', '$documento', '$email', '$contrasenaHash', '$cargo', '$programa')";

    if ($conn->query($sql) === TRUE) {
        echo "Evaluador registrado con éxito.";
        header("refresh:3;url=../vista/registrarevaluador.php"); 
        // Aquí puedes redirigir al usuario a una página de éxito
    } else {
        echo "Error al registrar el evaluador: " . $conn->error;
    }
}

$conn->close();

?>