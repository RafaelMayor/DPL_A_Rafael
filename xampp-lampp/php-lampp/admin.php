<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html'); // Redirigir a login si no es admin
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <h1>Gestión de Usuarios</h1>

    <!-- Enlace para cerrar sesión -->
    <a href="logout.php">Cerrar sesión</a>

    <!-- Formulario para registrar al usuario -->
    <h2>Registrar Usuario</h2>
    <form action="insert.php" method="POST">
        Nombre: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Role: <input type="role" name="role" required><br><br>
        <input type="submit" value="Insertar Usuario">
    </form>

    <hr>

    <!-- Formulario para actualizar datos del usuario -->
    <h2>Actualizar Usuario</h2>
    <form action="update.php" method="POST">
        ID del usuario a actualizar: <input type="number" name="id" required><br><br>
        Nuevo nombre: <input type="text" name="name" required><br><br>
        Nuevo email: <input type="email" name="email" required><br><br>
        New password: <input type="password" name="password" required><br><br>
        New Role: <input type="role" name="role" required><br><br>
        <input type="submit" value="Actualizar Usuario">
    </form>

    <hr>

    <!-- Formulario para borrar al usuario -->
    <h2>Eliminar Usuario</h2>
    <form action="delete.php" method="POST">
        ID del usuario a eliminar: <input type="number" name="id" required><br><br>
        <input type="submit" value="Eliminar Usuario">
    </form>

    <!--Botón para mostrar los registros en la base de datos-->
    <form action="leer.php" method="POST" class="no-style">
        <button type="submit" id="btn" >Mostrar Datos</button>
    </form>

</body>
</html>
