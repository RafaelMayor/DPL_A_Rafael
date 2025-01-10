<?php
session_start();

// Verificar si el usuario está autenticado y tiene un rol normal
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: index.html'); // Redirigir a login si no es usuario normal
    exit();
}

// Conectar a la base de datos para obtener información del usuario
$con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos del usuario desde la base de datos
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email, date FROM users WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error al obtener datos del usuario: " . mysqli_error($con));
}

$user = mysqli_fetch_assoc($result); // Obtener los datos del usuario

mysqli_close($con); // Cerrar la conexión con la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Usuario Normal</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['name']; ?>!</h1>

    <!-- Información relevante para el usuario normal -->
    <h2>Información de tu cuenta:</h2>
    <p><strong>Nombre:</strong> <?php echo $user['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Fecha de registro:</strong> <?php echo date('d-m-Y', strtotime($user['date'])); ?></p>

    <h2>Acciones disponibles:</h2>
    <p>Aquí puedes gestionar tu perfil o ver otros detalles relacionados con tu cuenta.</p>

    <!-- Ejemplo de acción: cambiar contraseña -->
    <p><a href="change_password.php">Cambiar mi contraseña</a></p>

    <!-- Botón para cerrar sesión -->
    <form action="logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>

</body>
</html>
