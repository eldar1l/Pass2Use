<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "arrozconleche", "pass2use");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Login de usuario
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica si el usuario existe
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // Inicia sesión
        session_start();
        $_SESSION['username'] = $username;
        header("Location: /html/generador.html"); // Redirige a la página principal
        exit;
    } else {
        $error = true;
        header("Location: /html/login.html?error=true"); // Redirige al formulario de inicio de sesión con error
        exit;
    }
}
?>