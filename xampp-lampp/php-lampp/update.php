<?php
$con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $update = "UPDATE users SET name = '$name', email = '$email', password = '$hashed_password', role = '$role' WHERE id = $id";

    $return = mysqli_query($con, $update);

    if ($return) {
        echo "El usuario se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
