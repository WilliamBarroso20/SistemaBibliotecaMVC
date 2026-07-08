FROM php:8.2-apache

# Instalar mysqli
RUN docker-php-ext-install mysqli

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiamos solo el contenido de la subcarpeta 'public' a la raíz de Apache
COPY ./SistemaBibliotecaMVC/public /var/www/html/

# Copiamos el resto de las carpetas (app, config, etc.) a una subcarpeta
COPY ./SistemaBibliotecaMVC /var/www/html/SistemaBibliotecaMVC

EXPOSE 80
