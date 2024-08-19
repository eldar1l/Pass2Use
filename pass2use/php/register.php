<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "arrozconleche", "pass2use");

// Verifica la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Registro de usuario
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica si el usuario ya existe
    $query = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($result) > 0) {
        echo "El usuario ya existe";
    } else {
        // Inserta el usuario en la base de datos
        $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        header("Location: /html/generador.html"); // Redirige a la página principal
        exit;
    }
}

// Formulario de registro
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylesindex.css">
    <title>PASS2USE</title>
</head>
<body>

    <header>
        <h1>Pass2Use</h1>
    </header>

    <main>
        <section>  
            <form action="register.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" name="register" value="Register">
            </form>
        </section>
    </main>
