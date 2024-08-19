<?php
// Verifica si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Conecta a la base de datos
$conn = mysqli_connect("localhost", "username", "password", "database");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Agrega una nueva contraseña
if (isset($_POST['password']) && isset($_POST['description'])) {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $description = $_POST['description'];

    $query = "INSERT INTO passwords (user_id, password, description) VALUES (" . $_SESSION['user_id'] . ", '$password', '$description')";
    mysqli_query($conn, $query);

    header("Location: dashboard.php");
    exit