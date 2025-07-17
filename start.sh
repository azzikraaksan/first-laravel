#!/bin/sh

# Salin .env kalau belum ada
[ ! -f .env ] && cp .env.example .env

# Generate app key kalau belum ada
php artisan key:generate --force
php artisan storage:link
php artisan migrate --force

# Cache config, route, dan view
php artisan config:cache
php artisan route:cache
php artisan view:cache

chmod -R 775 storage bootstrap/cache

# Start Laravel dengan PHP built-in server
php artisan serve --host=0.0.0.0 --port=8000
