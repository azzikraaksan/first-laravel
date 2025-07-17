FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Copy permission untuk storage dan bootstrap
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Install dependencies (opsional bisa kasih env jika prod)
RUN composer install --optimize-autoloader --no-interaction --no-dev

# Laravel caches (bisa skip kalau masih dev)
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose port (boleh 8000, 8080, bebas asal match sama `CMD`)
EXPOSE 8080

# Run Laravel (bukan ideal, tapi bisa untuk dev)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
