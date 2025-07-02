FROM php:8.2-cli

# Installer dépendances
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev && \
    docker-php-ext-install pdo pdo_sqlite zip

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier les fichiers
COPY . /var/www
WORKDIR /var/www

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Générer la clé Laravel
RUN php artisan key:generate

# Lancer le serveur Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
