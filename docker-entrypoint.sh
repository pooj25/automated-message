#!/bin/bash
set -e

# Configure Apache port based on Render $PORT
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/" /etc/apache2/sites-available/000-default.conf

# Cache & migrate
php artisan config:clear || true
php artisan migrate --force || true

exec apache2-foreground
