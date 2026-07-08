FROM php:8.2-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
# Copiamos todo el contenido de la subcarpeta a la raíz del servidor
COPY ./SistemaBibliotecaMVC /var/www/html/
EXPOSE 80
