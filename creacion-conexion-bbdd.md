<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>

### Crear base de datos, crear tablas, conexión a la base de datos:

Crear una base de datos, tablas y realizar una conexión a una base de datos varía según el sistema de gestión de bases de datos (DBMS) que utilices. Aquí te explico el proceso usando **MySQL** y el lenguaje **SQL**. 

### 1. Creación de una base de datos
Para crear una base de datos en MySQL, se utiliza el siguiente comando SQL:

```sql
CREATE DATABASE nombre_de_base_de_datos;
```

Ejemplo:

```sql
CREATE DATABASE tienda;
```

### 2. Creación de una tabla y sus campos
Una vez que la base de datos está creada, debes seleccionarla y luego crear las tablas. Para esto, se utiliza el comando `CREATE TABLE`. Aquí defines los campos y sus tipos de datos.

```sql
USE nombre_de_base_de_datos;

CREATE TABLE nombre_de_tabla (
    nombre_campo1 TIPO_DE_DATO CONSTRAINTS,
    nombre_campo2 TIPO_DE_DATO CONSTRAINTS,
    ...
);
```

Ejemplo:

```sql
USE tienda;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0
);
```

Este comando crea una tabla llamada `productos` con los campos:
- `id` (un número entero que se autoincrementa y es clave primaria),
- `nombre` (una cadena de hasta 100 caracteres, que no puede ser nulo),
- `precio` (un número decimal con dos decimales),
- `stock` (un entero que tiene por defecto el valor 0).

### 3. Conexión a la base de datos
Para conectarse a la base de datos desde un lenguaje de programación como **Python**, puedes usar una librería como `mysql-connector` o `pymysql`. A continuación, un ejemplo de cómo conectarse con `mysql-connector`:

```python
import mysql.connector

conexion = mysql.connector.connect(
    host="localhost",  
    user="tu_usuario",  
    password="tu_contraseña",  
    database="tienda"  
)

if conexion.is_connected():
    print("Conexión exitosa")
else:
    print("Error en la conexión")

conexion.close()
```

Este código establece una conexión a una base de datos llamada `tienda` en un servidor local utilizando las credenciales del usuario.

</div>