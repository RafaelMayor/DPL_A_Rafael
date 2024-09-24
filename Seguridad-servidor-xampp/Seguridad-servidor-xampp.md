<div align="justify">

<div align="right">

### **Rafael Martín Mayor**

</div>

## Seguridad servidor phpmyadmin XAMPP:

### Paso 1:

Abrimos XAMPP y le damos al botón Open Aplication Folder:

![](capt_1.png)

### Paso 2:

Buscamos el fichero config.inc.php y lo abrimos:

![](capt_2.png)

### Paso 3:

Buscamos donde ponga $cfg['Servers'][$i]['password'] y ponemos la contraseña que deseemos y un poco más arriba buscamos donde ponga $cfg['Servers'][$i]['auth_type'] y ponemos 'http':

![](capt_3.png)

Al hacer eso conseguiremos que cada vez que entremos al localhost tengamos que iniciar sesión:

![](capt_4.png)


## Crear nuevo usuario:

### Paso 1:

Abrimos el interfaz de phpmyadmin y seleccionamos la opción Cuentas de usuario:
  
![](capt_5.png)

### Paso 2:

Una vez ahí bajando le damos a Agregar cuenta de usuario:
  
![](capt_6.png)

### Paso 3:

Rellenamos los datos para el usuario:

![](capt_7.png)

### Paso 4:

Le damos los permisos que consideremos necesarios y listo:

![](capt_8.png)

</div>