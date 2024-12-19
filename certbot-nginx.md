<div align='right'>

### **Rafael Martín Mayor**

</div>

# Instalar certificado Let's Encrypt con certbot en nginx con host virtuales

Instalar un certificado SSL de Let's Encrypt con **Certbot** en un servidor **Nginx** que usa **hosts virtuales** es un proceso sencillo. Aquí tienes los pasos detallados:

---

## 1. **Instalar Certbot y el complemento de Nginx**
Certbot facilita la configuración automática de SSL. Instala Certbot y su complemento para Nginx:

### En sistemas basados en Debian/Ubuntu:
```bash
sudo apt update
sudo apt install certbot python3-certbot-nginx
```

---

## 2. **Configurar hosts virtuales en Nginx**
Asegúrate de que tienes configurados los hosts virtuales para cada dominio en archivos separados. Por ejemplo, un archivo como `/etc/nginx/sites-available/example.com` podría tener:

```nginx
server {
    server_name example.com www.example.com;

    root /var/www/example.com;
    index index.html;

    location / {
        try_files $uri $uri/ =404;
    }
}
```

Habilita el sitio (si no lo has hecho):
```bash
sudo ln -s /etc/nginx/sites-available/example.com /etc/nginx/sites-enabled/
```

Prueba la configuración de Nginx:
```bash
sudo nginx -t
```

Recarga Nginx:
```bash
sudo systemctl reload nginx
```

---

## 3. **Solicitar el certificado SSL con Certbot**
Ejecuta el siguiente comando para obtener e instalar el certificado automáticamente:

```bash
sudo certbot --nginx -d example.com -d www.example.com
```

- **`-d example.com -d www.example.com`**: Especifica los dominios que quieres cubrir con el certificado.
- Certbot detectará automáticamente el archivo de configuración de Nginx del host virtual correspondiente.

Sigue las instrucciones en pantalla para completar la instalación. Certbot configurará Nginx automáticamente para usar el certificado SSL.

---

## 4. **Verificar la configuración**
Prueba la configuración de Nginx nuevamente:
```bash
sudo nginx -t
```

Recarga Nginx para aplicar los cambios:
```bash
sudo systemctl reload nginx
```

---

## 5. **Automatizar la renovación**
Let's Encrypt emite certificados válidos por 90 días. Certbot incluye un cron job para manejar la renovación automáticamente. Asegúrate de que funciona ejecutando un simulacro de renovación:

```bash
sudo certbot renew --dry-run
```

Si ves "Success", la renovación automática está funcionando correctamente.

---

Con estos pasos, tendremos un certificado SSL de Let's Encrypt instalado y funcionando correctamente en Nginx con hosts virtuales.