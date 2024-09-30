<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>

### Redireccionamiento de páginas en PHP

Para redireccionar entre páginas en PHP, puedes usar la función header() que envía encabezados HTTP al navegador, lo que permite redireccionar a otra página o archivo.

A continuación podemos ver un ejemplo de redireccionamiento php con la función header() en el que, al pinchar en el enlace de redirecciones.php se nos redirigirá a pagina2.php, la cual nos redirigirá con la función header() a pagina3.php:

redirecciones.php :

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecciones</title>
</head>
<body>
    <a href="pagina2.php">Redireccion</a>
</body>
</html>
```

pagina2.php :

```php
<?php

    echo "pagina 2";

    header( "location: pagina3.php");
```

pagina3.php :

```php
<?php

    echo "pagina 3";
```

Con esto ya podríamos hacer redirecciones básicas entre archivos php, aunque también las podemos hacer con parámetros:

```php
<?php

    header("Location: pagina_destino.php?usuario=juanjo&edad=25");
```



</div>