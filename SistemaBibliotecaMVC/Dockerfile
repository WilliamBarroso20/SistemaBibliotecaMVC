FROM php:8.2-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
# Copia todo el contenido del directorio actual a la carpeta de Apache
COPY . /var/www/html/
EXPOSE 80
