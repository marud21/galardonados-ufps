
<?php

include 'conexion.php';
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptación de la contraseña



/
// Crear consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";

// Ejecutar la consulta y verificar si se realizó con éxito

i
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    
   
echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>