FROM php:8.2-apache

# Instalar mysqli
RUN docker-php-ext-install mysqli

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar TODO el proyecto a la carpeta /var/www/html
COPY . /var/www/html/

# --- AQUÍ ESTÁ EL TRUCO ---
# Le decimos a Apache que la raíz del sitio no es /var/www/html,
# sino la subcarpeta /var/www/html/SistemaBibliotecaMVC/public
RUN sed -i 's|/var/www/html|/var/www/html/SistemaBibliotecaMVC/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
