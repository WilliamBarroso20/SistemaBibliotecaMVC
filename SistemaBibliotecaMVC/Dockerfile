FROM php:8.2-apache

# Instalar mysqli
RUN docker-php-ext-install mysqli

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Mover todo el contenido de la subcarpeta a la raíz de Apache
# Usamos un comando mv después de copiar
COPY ./SistemaBibliotecaMVC /var/www/html/
RUN mv /var/www/html/SistemaBibliotecaMVC/* /var/www/html/ && rm -rf /var/www/html/SistemaBibliotecaMVC

EXPOSE 80
