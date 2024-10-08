<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>

## Interfaces de contacto con los ficheros php anteriores:

A continuación los formularios HTML correspondientes para insertar, leer, modificar y borrar registros, utilizando el método `POST` para enviar los datos a los archivos PHP:

### 1. **Formulario para Insertar un Registro**

Este formulario enviará los datos de un nuevo usuario a `insert.php`.

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Usuario</title>
</head>
<body>
    <h2>Insertar Usuario</h2>
    <form action="insert.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <input type="submit" value="Insertar">
    </form>
</body>
</html>
```

**Código PHP (`insert.php`):**

```php
<?php
$servername = "localhost";
$username = "rafa";
$password = "1234";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $sql = "INSERT INTO users (nombre, email, edad) VALUES ('$nombre', '$email', $edad)";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario insertado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
```

### 2. **Formulario para Leer Registros**

No se necesita un formulario para leer registros. Simplemente puedes tener un archivo que muestre los registros de la tabla:

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Leer Usuarios</title>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <?php include 'read.php'; ?>
</body>
</html>
```

**Código PHP (`read.php`):**

```php
<?php
$servername = "localhost";
$username = "rafa";
$password = "1234";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, email, edad FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Email: " . $row["email"] . " - Edad: " . $row["edad"] . "<br>";
    }
} else {
    echo "No hay resultados";
}

$conn->close();
?>
```

### 3. **Formulario para Modificar un Registro**

Este formulario permite modificar un usuario existente. Los datos se enviarán a `update.php`.

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
</head>
<body>
    <h2>Modificar Usuario</h2>
    <form action="update.php" method="POST">
        <label for="id">ID del Usuario:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="nombre">Nuevo Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Nuevo Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Modificar">
    </form>
</body>
</html>
```

**Código PHP (`update.php`):**

```php
<?php
$servername = "localhost";
$username = "rafa";
$password = "1234";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET nombre='$nombre', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado con éxito";
    } else {
        echo "Error actualizando el usuario: " . $conn->error;
    }
}

$conn->close();
?>
```

### 4. **Formulario para Borrar un Registro**

Este formulario permite borrar un usuario específico por su `ID`. Los datos se enviarán a `delete.php`.

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Usuario</title>
</head>
<body>
    <h2>Borrar Usuario</h2>
    <form action="delete.php" method="POST">
        <label for="id">ID del Usuario:</label>
        <input type="number" id="id" name="id" required><br><br>

        <input type="submit" value="Borrar">
    </form>
</body>
</html>
```

**Código PHP (`delete.php`):**

```php
<?php
$servername = "localhost";
$username = "rafa";
$password = "1234";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario borrado con éxito";
    } else {
        echo "Error borrando el usuario: " . $conn->error;
    }
}

$conn->close();
?>
```

</div>