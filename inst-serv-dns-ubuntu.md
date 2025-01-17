# Rafael Martín Mayor

# Instalar servidor DNS en ubuntu

# 1. Comprobar actualizaciones
sudo apt update
sudo apt upgrade

# 2. Instalar Bind9 y Nano (editor de texto)
sudo apt install bind9 bind9-utils nano

# 3. Comprobar si Bind9 ya está funcionando
systemctl status bind9

# 4. Permitir el acceso al puerto de Bind9 en el Firewall
sudo ufw allow bind9
# Debe arrojar: Rules Update

# 5. Configuración mínima de Bind9
sudo nano /etc/bind/named.conf.options
# Modificar las siguientes líneas:
listen-on { any; };
allow-query { localhost; 10.10.20.0/24; };
forwarders {
    8.8.8.8;
    8.8.4.4;
};
dnssec-validation no;

# 6. Obligar el uso único de IPv4
sudo nano /etc/default/named
# Modificar la línea para que quede así:
OPTIONS="-u bind -4"

# 7. Comprobar la configuración de Bind9 y reiniciar el servicio
sudo named-checkconf
sudo systemctl restart bind9
systemctl status bind9

# 8. Agregar las Zonas
sudo nano /etc/bind/named.conf.local
# Añadir las siguientes zonas:
zone "networld.cu" IN {
    type master;
    file "/etc/bind/zonas/db.networld.cu";
};
zone "20.10.10.in-addr.arpa" {
    type master;
    file "/etc/bind/zonas/db.10.10.20";
};

# 9. Crear el directorio para los archivos de zonas
sudo mkdir /etc/bind/zonas

# 10. Crear la zona directa
sudo nano /etc/bind/zonas/db.networld.cu
# Añadir el siguiente contenido:
$TTL 1D
@ IN SOA ns1.networld.cu. admin.networld.cu. (
    1 ; Serial
    12h ; Refresh
    15m ; Retry
    3w ; Expire
    2h ) ; Negative Cache TTL
; Registros NS
IN NS ns1.networld.cu.
ns1 IN A 10.10.20.13
www IN A 10.10.20.13

# 11. Crear la zona inversa
sudo nano /etc/bind/zonas/db.10.10.20
# Añadir el siguiente contenido:
$TTL 1d ;
@ IN SOA ns1.networld.cu admin.networld.cu. (
    20210222 ; Serial
    12h ; Refresh
    15m ; Retry
    3w ; Expire
    2h ) ; Negative Cache TTL
;
@ IN NS ns1.networld.cu.
1 IN PTR www.networld.cu.

# 12. Comprobar los archivos de zona
sudo named-checkzone networld.cu /etc/bind/zonas/db.networld.cu
sudo named-checkzone db.20.10.10.in-addr.arpa /etc/bind/zonas/db.10.10.20
# Debemos obtener un OK en cada comprobación

# 13. Reiniciar el servicio Bind9
sudo systemctl restart bind9

# 14. Comprobar funcionamiento desde otra PC
ping www.networld.cu
