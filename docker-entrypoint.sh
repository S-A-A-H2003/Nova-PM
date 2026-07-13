#!/bin/bash
set -e

export DB_CONNECTION="${DB_CONNECTION:-sqlite}"
export DB_DATABASE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
export CACHE_STORE="${CACHE_STORE:-file}"
export SESSION_DRIVER="${SESSION_DRIVER:-file}"
export QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env || true
fi

touch .env

grep -q '^APP_KEY=' .env || echo 'APP_KEY=' >> .env
grep -q '^DB_CONNECTION=' .env || echo 'DB_CONNECTION=sqlite' >> .env
grep -q '^DB_DATABASE=' .env || echo 'DB_DATABASE=/var/www/html/database/database.sqlite' >> .env
grep -q '^DB_HOST=' .env || echo 'DB_HOST=127.0.0.1' >> .env
grep -q '^DB_PORT=' .env || echo 'DB_PORT=3306' >> .env
grep -q '^DB_USERNAME=' .env || echo 'DB_USERNAME=root' >> .env
grep -q '^DB_PASSWORD=' .env || echo 'DB_PASSWORD=' >> .env
grep -q '^CACHE_STORE=' .env || echo 'CACHE_STORE=file' >> .env
grep -q '^SESSION_DRIVER=' .env || echo 'SESSION_DRIVER=file' >> .env
grep -q '^QUEUE_CONNECTION=' .env || echo 'QUEUE_CONNECTION=sync' >> .env

sed -i "s|^DB_CONNECTION=.*|DB_CONNECTION=${DB_CONNECTION}|" .env
sed -i "s|^DB_DATABASE=.*|DB_DATABASE=${DB_DATABASE}|" .env
sed -i 's|^DB_HOST=.*|DB_HOST=127.0.0.1|' .env
sed -i 's|^DB_PORT=.*|DB_PORT=3306|' .env
sed -i 's|^DB_USERNAME=.*|DB_USERNAME=root|' .env
sed -i 's|^DB_PASSWORD=.*|DB_PASSWORD=|' .env
sed -i "s|^CACHE_STORE=.*|CACHE_STORE=${CACHE_STORE}|" .env
sed -i "s|^SESSION_DRIVER=.*|SESSION_DRIVER=${SESSION_DRIVER}|" .env
sed -i "s|^QUEUE_CONNECTION=.*|QUEUE_CONNECTION=${QUEUE_CONNECTION}|" .env

mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache \
    database

if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

chown -R www-data:www-data \
    storage bootstrap/cache database

chmod -R 775 \
    storage bootstrap/cache database

chmod 664 database/database.sqlite

php artisan key:generate --force || true
php artisan config:clear
php artisan view:clear
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link || true

exec apache2-foreground
