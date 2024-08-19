<?php
// Verifica si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Conecta a la base de datos
$conn = mysqli_connect("localhost", "root", "arrozconleche", "pass2use");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Muestra la lista de contraseñas del usuario
$query = "SELECT * FROM passwords WHERE user_id = " . $_SESSION['user_id'];
$result = mysqli_query($conn, $query);

while ($password = mysqli_fetch_assoc($result)) {
    echo "<p>" . $password['description'] . ": " . $password['password'] . "</p>";
}

// Cierra la conexión
mysqli_close($conn);
?>