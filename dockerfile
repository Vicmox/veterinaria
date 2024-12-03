# Usamos una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias, por ejemplo, PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar los archivos de la aplicación al directorio raíz del servidor web
COPY ./public /var/www/html

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configurar el servidor Apache
EXPOSE 80
