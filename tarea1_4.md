<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>

## **Tarea 1.3- Trabajando con Git y Markdown 3**

### 1. Crear un directorio de trabajo y inicializar un repositorio de Git

```bash
mkdir bloggalpon
cd bloggalpon
git init
```

### 2. Crear el archivo `index.htm` con la estructura básica de una página web

Abrimos el archivo `index.htm` en visual y añadimos la siguiente estructura básica:

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Galpón</title>
</head>
<body>
</body>
</html>
```

Hacemos un commit:

```bash
git add index.htm
git commit -m "Se crea el esqueleto básico del index.htm"
```

### 3. Añadir contenido al `<head>`

Añadimos las etiquetas meta y otros elementos dentro del `<head>` si es necesario:

```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Galpón</title>
    <link rel="stylesheet" href="style.css">
</head>
```

Hacemos un commit:

```bash
git add index.htm
git commit -m "Se añade la cabecera del index.htm"
```

### 4. Añadir la estructura básica al `<body>`

Añadimos una estructura básica dentro del `<body>`:

```html
<body>
    <header>
        <h1>Bienvenidos al Blog Galpón</h1>
    </header>
    <section>
    </section>
    <footer>
        <p>Copyright © 2012 Blog Galpón</p>
    </footer>
</body>
```

Hacemos un commit:

```bash
git add index.htm
git commit -m "Se añade la estructura básica del body"
```

### 5. Añadir contenido a `<section>`

Rellenamos la sección `<section>` con la estructura de los posts:

```html
<section>
    <article>
        <h2>Primer Post</h2>
        <p>Contenido del primer post.</p>
    </article>
</section>
```

Hacemos un commit:

```bash
git add index.htm
git commit -m "Se añade toda la estructura de la zona de posts"
```

### 6. Crear el archivo `style.css` y añadir las primeras reglas de CSS

Creamos el archivo `style.css`:

```bash
touch style.css
```

Añadimos las reglas básicas de estilo para `html` y `body`:

```css
html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
```

Hacemos un commit:

```bash
git add style.css
git commit -m "Se añaden las CSS de html y de body"
```

### 7. Añadir CSS para elementos HTML5: `header`, `section`, `article`, `aside`, y `footer`

Añadimos lo siguiente a `style.css`:

```css
header, section, article, aside, footer {
    display: block;
}
```

Hacemos un commit:

```bash
git add style.css
git commit -m "Se añaden las CSS de varios elementos HTML5: header, section, article, aside y footer"
```

### 8. Añadir el logotipo en el directorio raíz del proyecto

Colocamos el archivo `logo.png` en el directorio raíz del proyecto (`~/bloggalpon/`).

Hacemos un commit:

```bash
git add logo.png
git commit -m "Se añade el logotipo de Galpón"
```

### 9. Añadir CSS para `<section>`

Añadimos los estilos para la sección en `style.css`:

```css
section {
    padding: 20px;
    background-color: #f4f4f4;
}
```

Hacemos un commit:

```bash
git add style.css
git commit -m "Se añaden las CSS de section"
```

### 10. Añadir CSS para `<footer>`

Añadimos los estilos para el pie de página:

```css
footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
}
```

Hacemos un commit:

```bash
git add style.css
git commit -m "Se añaden las CSS del footer"
```

### 11. Añadir CSS para el `<h1>` y los enlaces

Añadimos los estilos para los encabezados y enlaces:

```css
h1 {
    font-size: 2em;
    color: #333;
}

a {
    color: #007BFF;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
```

Hacemos un commit:

```bash
git add style.css
git commit -m "Se añaden las CSS del H1 y de los enlaces"
```

### 12. Crear una etiqueta `v1.0`

Creamos una etiqueta para la versión 1.0:

```bash
git tag v1.0
```

### 14. Crear la rama “desarrollo”

Desde el directorio de trabajo (`~/bloggalpon`), creamos y cambiamos a la nueva rama llamada `desarrollo`:

```bash
git checkout -b desarrollo
```

### 15. Mover el logotipo `logo.png` al directorio `images`

Creamos el directorio `images` y movemos el archivo `logo.png` allí:

```bash
mkdir images
mv logo.png images/
```

Hacemos un commit para registrar el cambio:

```bash
git add images/logo.png
git rm logo.png
git commit -m "Se mueve el logotipo a la carpeta images"
```

### 16. Mover el archivo CSS `style.css` al directorio `CSS`

Creamos un directorio `CSS` y movemos allí el archivo `style.css`:

```bash
mkdir css
mv style.css css/
```

Hacemos un commit para este cambio:

```bash
git add css/style.css
git rm style.css
git commit -m "Se mueve la CSS a la carpeta CSS"
```

### 17. Cambiar las referencias en `index.htm` y `style.css`

#### a. Cambiar la referencia de la hoja de estilos en `index.htm`

Abrimos `index.htm` y cambiamos la referencia de la hoja de estilos para que apunte al nuevo directorio `css`:

Antes:

```html
<link rel="stylesheet" href="style.css">
```

Después:

```html
<link rel="stylesheet" href="css/style.css">
```

#### b. Cambiar la referencia al logotipo en `style.css`

Abrimos el archivo `css/style.css` y cambiamos la referencia al logotipo si es necesario. Si había una referencia al logotipo en el archivo CSS, cambiamos la ruta a:

Antes (si existía algo similar):

```css
background-image: url('logo.png');
```

Después:

```css
background-image: url('../images/logo.png');
```

### 18. Crear un commit para las referencias actualizadas

Hacemos un commit para registrar estos cambios de referencias:

```bash
git add index.htm css/style.css
git commit -m "Se cambian las referencias a las CSS y a las imágenes al reorganizarlas en directorios"
```

### 19. Crear una rama `bugfix` a partir de `master`

Nos aseguramos de estar en la rama `master` y luego creamos la rama `bugfix`:

```bash
git checkout master
git checkout -b bugfix
```

### 20. Quitar los comentarios de las CSS relacionados con los bordes punteados

Abrimos el archivo `css/style.css` y eliminamos las líneas que comienzan con `//border`.

Después de hacer los cambios, hacemos un commit:

```bash
git add css/style.css
git commit -m "Se introducen los punteados en la barra derecha y en el footer"
```

### 21. Introducir el título “Galpon” en la página

Editamos el archivo `index.htm` para que el título sea:

```html
<title>Galpon</title>
```

Hacemos un commit con esta modificación:

```bash
git add index.htm
git commit -m "Se introduce el título en la página"
```

### 22. Cambiar 2012 por 2014 en el footer y quitar el símbolo (c)

Abrimos `index.htm` y cambiamos el año en el `footer` de 2012 a 2014. También quitamos el símbolo (c).

Antes:

```html
<footer>
    <p>Copyright © 2012 Blog Galpón</p>
</footer>
```

Después:

```html
<footer>
    <p>Copyright 2014 Blog Galpón</p>
</footer>
```

Hacemos un commit para estos ajustes:

```bash
git add index.htm
git commit -m "Se realizan pequeños ajustes en el footer"
```

### 23. Crear una etiqueta `v1.1`

Después de los cambios, etiquetamos la versión como `v1.1`:

```bash
git tag v1.1
```

### 24. Llevar los cambios a la rama `master`

Cambiamos de vuelta a la rama `master`:

```bash
git checkout master
```

Fusionamos los cambios desde la rama `bugfix` a `master`:

```bash
git merge bugfix
```

### 25. Borrar la rama `bugfix`

Una vez que los cambios se hayan fusionado en `master`, podemos borrar la rama `bugfix`:

```bash
git branch -d bugfix
```

### 26. Llevar los cambios de la rama `desarrollo` a la rama `master`

Fusionamos la rama `desarrollo` en `master`. Cambiamos a la rama `master` si no estamos ya en ella:

```bash
git checkout master
```

Fusionamos los cambios de `desarrollo`:

```bash
git merge desarrollo
```

#### Resolver conflictos (si los hay)

Si hay conflictos, Git nos lo indicará y tendremos que resolverlos manualmente. Usaremos un editor de texto para revisar los archivos en conflicto y eligiremos qué cambios queremos conservar. Después de resolver los conflictos:

1. Editamos los archivos para solucionar los conflictos.
2. Añadimos los archivos con los conflictos resueltos:

    ```bash
    git add <archivo>
    ```

3. Finalizamos la fusión:

    ```bash
    git commit
    ```

### 27. Crear una etiqueta `v1.2`

Etiquetamos la versión como `v1.2`:

```bash
git tag v1.2
```


</div>
