FROM php:8.2-apache

# Instalar mysqli
RUN docker-php-ext-install mysqli

# Habilitar mod_rewrite para el enrutamiento MVC
RUN a2enmod rewrite

# Copiar el contenido de la subcarpeta al directorio raíz de Apache
COPY ./SistemaBibliotecaMVC /var/www/html/

# Asegurar que Apache apunte a la carpeta pública
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
