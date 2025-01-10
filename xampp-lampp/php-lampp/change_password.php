<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar y procesar el cambio de contraseña
    $new_password = $_POST['new_password'];
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    // Conectar a la base de datos
    $con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Actualizar la contraseña en la base de datos
    $user_id = $_SESSION['user_id'];
    $update_query = "UPDATE users SET password = '$new_password_hash' WHERE id = '$user_id'";

    if (mysqli_query($con, $update_query)) {
        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Error al actualizar la contraseña: " . mysqli_error($con);
    }

    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h1>Cambiar mi contraseña</h1>

    <form action="change_password.php" method="POST">
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" name="new_password" id="new_password" required>
        <br><br>
        <button type="submit">Cambiar Contraseña</button>
    </form>

    <br><br>
    <a href="user_dashboard.php">Volver a mi perfil</a>
</body>
</html>
