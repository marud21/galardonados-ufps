<?php

include 'conexion.php';
$conn = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $usuario = $_POST["usuario"];
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $documento = $_POST["documento"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $cargo = $_POST["cargo"];
    $programa = $_POST["programa"];

    // Hashear la contraseña si se ha modificado
    if (!empty($contrasena)) {
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "UPDATE evaluadores SET 
                usuario='$usuario', 
                codigo='$codigo', 
                nombre='$nombre', 
                apellido='$apellido', 
                documento='$documento', 
                email='$email', 
                contrasena='$contrasenaHash', 
                id_cargo='$cargo', 
                id_programa='$programa' 
                WHERE id=$id";
    } else {
        $sql = "UPDATE evaluadores SET 
                usuario='$usuario', 
                codigo='$codigo', 
                nombre='$nombre', 
                apellido='$apellido', 
                documento='$documento', 
                email='$email', 
                id_cargo='$cargo', 
                id_programa='$programa' 
                WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Evaluador actualizado con éxito.";
        // Puedes redirigir al usuario a la página de la tabla de evaluadores
        header("Location: ../vista/registrarevaluador.php"); 
        exit();
    } else {
        echo "Error al actualizar el evaluador: " . $conn->error;
    }
}

$conn->close();

?>