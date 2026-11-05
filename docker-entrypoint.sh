#!/bin/bash
set -e

# Configure Apache port based on Render dynamic $PORT
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/" /etc/apache2/sites-available/000-default.conf

# Ensure database directory and sqlite file exist with correct permissions
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run package discovery and migrations
php artisan package:discover --ansi || true
php artisan config:clear || true
php artisan migrate --force || true

exec apache2-foreground
