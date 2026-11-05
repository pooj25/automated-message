#!/bin/bash
set -e

# Configure Apache port based on Render dynamic $PORT
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/" /etc/apache2/sites-available/000-default.conf

# Ensure .env exists inside container
if [ ! -f /var/www/html/.env ]; then
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Ensure database directory and sqlite file exist
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Fix permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear cache and run migrations
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan migrate --force || true

exec apache2-foreground
