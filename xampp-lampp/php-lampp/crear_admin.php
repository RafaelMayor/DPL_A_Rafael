<?php
$con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Datos del usuario admin
$name = 'admin';
$email = 'rmarmay2004@gmail.com'; // Asegúrate de usar un email único
$password = 'admin'; // Contraseña que queremos hashear
$role = 'admin'; // El rol que le asignamos al usuario

// Hashear la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Crear el query para insertar el usuario admin
$insert = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";

if (mysqli_query($con, $insert)) {
    echo "Usuario admin creado con éxito.";
} else {
    echo "Error al crear el usuario: " . mysqli_error($con);
}

mysqli_close($con);
?>
