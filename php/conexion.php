<?php
$conn = new mysqli("localhost", "root", "", "galardonados_ufps");
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
} else {
    echo "Conexión exitosa!";
}
?>