<?php
$con = mysqli_connect('sql311.infinityfree.com', 'if0_37582057', 'abcabc12341234', 'if0_37582057_prueba');

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert = "INSERT INTO users(name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";

    $return = mysqli_query($con, $insert);

    if ($return) {
        echo "El usuario se ha registrado con éxito.";
    } else {
        echo "Error al insertar: " . mysqli_error($con);
    }
}
mysqli_close($con);
?>
