<div align="justify">

<div align="right">

### **Rafael Martín Mayor.**

</div>

### Métodos de paso de variables de formularios: GET y POST

#### 1. **Paso de variables con el método GET:**

El método GET envía los datos del formulario a través de la URL, haciendo visibles las variables en la barra de direcciones del navegador.

**Pasos:**

1. Crear un formulario HTML y establecer el atributo `method` como `GET`.
2. Definir los campos de entrada (`input`) cuyos valores serán enviados.
3. Enviar el formulario, lo cual agrega los datos al final de la URL como parámetros de consulta.
4. En el servidor, los datos se pueden obtener accediendo a las variables de consulta.

**Ejemplo:**

```html
<form action="/procesar_get" method="GET">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre">
  <label for="edad">Edad:</label>
  <input type="text" id="edad" name="edad">
  <button type="submit">Enviar</button>
</form>
```

Cuando se envía el formulario, los datos serán añadidos a la URL como:
```
/procesar_get?nombre=Juan&edad=30
```

#### 2. **Paso de variables con el método POST:**

El método POST envía los datos del formulario en el cuerpo de la solicitud HTTP, lo que hace que las variables no sean visibles en la URL.

**Pasos:**

1. Crear un formulario HTML y establecer el atributo `method` como `POST`.
2. Definir los campos de entrada (`input`) cuyos valores serán enviados.
3. Enviar el formulario, lo cual envía los datos en el cuerpo de la solicitud.
4. En el servidor, los datos se pueden obtener a través de los datos del cuerpo de la solicitud.

**Ejemplo:**

```html
<form action="/procesar_post" method="POST">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre">
  <label for="edad">Edad:</label>
  <input type="text" id="edad" name="edad">
  <button type="submit">Enviar</button>
</form>
```

En este caso, los datos no aparecerán en la URL, sino que estarán en el cuerpo de la solicitud HTTP.

- El método GET envía datos en la URL. Es visible y adecuado para datos no sensibles.
- El método POST envía datos en el cuerpo de la solicitud. Es más seguro y adecuado para datos sensibles o grandes.

</div>