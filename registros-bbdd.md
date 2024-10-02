<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>


### Insertar, leer, modificar y borrar registros de la base de datos:

A continuación veremos los pasos necesarios para insertar, leer, modificar y borrar registros en una base de datos MySQL usando PHP. La base de datos se llama `prueba` y la tabla es `users`. La tabla tendrá las siguientes columnas: `id`, `nombre`, `email`, `edad`.

### 1. **Conectar a la base de datos**

Antes de realizar cualquier operación, primero necesitamos conectarnos a la base de datos. 

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
?>
```

### 2. **Insertar un registro**

Para insertar un nuevo registro en la tabla `users`:

```php
<?php
$nombre = "Juan";
$email = "juan@example.com";
$edad = 30;

$sql = "INSERT INTO users (nombre, email, edad) VALUES ('$nombre', '$email', $edad)";

if ($conn->query($sql) === TRUE) {
    echo "Registro insertado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
```

### 3. **Leer registros**

Para leer todos los registros de la tabla `users`:

```php
<?php
$sql = "SELECT id, nombre, email, edad FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Email: " . $row["email"] . " - Edad: " . $row["edad"] . "<br>";
    }
} else {
    echo "No hay resultados";
}
?>
```

### 4. **Modificar un registro**

Para modificar un registro existente (por ejemplo, actualizar el nombre y el email del usuario con `id = 1`):

```php
<?php
$nombre = "Carlos";
$email = "carlos@example.com";

$sql = "UPDATE users SET nombre='$nombre', email='$email' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado con éxito";
} else {
    echo "Error actualizando el registro: " . $conn->error;
}
?>
```

### 5. **Borrar un registro**

Para borrar un registro (por ejemplo, el usuario con `id = 1`):

```php
<?php
$sql = "DELETE FROM users WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Registro borrado con éxito";
} else {
    echo "Error borrando el registro: " . $conn->error;
}
?>
```

### 6. **Cerrar la conexión**

Una vez que hayamos terminado, es una buena práctica cerrar la conexión:

```php
<?php
$conn->close();
?>
```


</div>