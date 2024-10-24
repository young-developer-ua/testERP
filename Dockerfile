# Use PHP 8.1 with Apache as the base image
FROM php:8.1-apache

# Install necessary PHP extensions for Laravel and SQLite support
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libonig-dev \
    curl \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring pdo_sqlite gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Apache configuration file
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Copy the project files into the container
COPY . /var/www/html

# Set proper ownership and permissions for the project
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install project dependencies using Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions for storage and bootstrap/cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
