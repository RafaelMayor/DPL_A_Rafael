<?php
session_start(); // Iniciar la sesión para mantener al usuario logueado

$con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultamos el usuario por email
    $sql = "SELECT id, name, email, password, role FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verificamos si la contraseña coincide
        if (password_verify($password, $user['password'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role']; // Suponiendo que tienes un campo 'role'

            // Redirigir según el rol
            if ($user['role'] == 'admin') {
                // Administrador puede acceder a la página de gestión
                header('Location: admin.php');
            } else {
                // Usuario normal, página convencional
                header('Location: user_dashboard.php'); // Esta es una página convencional
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El usuario no existe.";
    }
}

mysqli_close($con);
?>
