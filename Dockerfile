# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones y dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nano \
    nodejs \
    npm

# Instala las extensiones PHP requeridas
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Habilita el mod_rewrite de Apache para Laravel
RUN a2enmod rewrite

# Ajusta la DocumentRoot a /var/www/html/public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Permite el uso de .htaccess en la carpeta public
RUN echo "<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n" >> /etc/apache2/sites-available/000-default.conf

# Establece el directorio de trabajo en /var/www/html
WORKDIR /var/www/html

# Copia el ejecutable de Composer desde la imagen oficial de Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copia los archivos de Composer y ejecuta la instalación de dependencias
COPY composer.lock composer.json /var/www/html/
RUN composer install --no-dev --no-scripts --prefer-dist

# Copia el resto del código de la aplicación
COPY . /var/www/html

# Ajusta permisos (para que www-data tenga acceso)
RUN chown -R www-data:www-data /var/www/html

# Instala dependencias de Node (si tu proyecto tiene package.json/package-lock.json)
# y compila los assets con Vite o Mix
RUN if [ -f package.json ]; then npm install; fi
RUN if [ -f package.json ]; then npm run build || npm run dev; fi

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
